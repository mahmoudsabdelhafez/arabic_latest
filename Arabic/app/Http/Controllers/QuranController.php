<?php

namespace App\Http\Controllers;

use App\Models\CausalReasoning;
use App\Models\ComparisonSimile;
use App\Models\ConclusionInference;
use App\Models\Conditional;
use App\Models\Conjunction;
use App\Models\Detail;
use App\Models\EncouragementUrging;
use App\Models\Exception;
use App\Models\Explanation;
use App\Models\Negative;
use App\Models\Preposition;
use App\Models\Pronoun;
use Illuminate\Http\Request;
use App\Models\Quran;
use App\Models\QuranAll;
use App\Models\QuranTextClean;
use App\Models\SequencingOrdering;
use App\Models\Specification;
use App\Models\Synchronization;

class QuranController extends Controller
{

    public function show()
    {
        return view('quran.index');
    }

    public function search(Request $request)
{
    $query = $request->input('query');

    // Get paginated results
    $results = QuranAll::whereRaw("BINARY text LIKE ?", ["%$query%"])->paginate(20);
    $clean_results = QuranTextClean::whereRaw("BINARY text LIKE ?", ["%$query%"])->paginate(20);

    // Get total count of results
    $total_results_count = QuranAll::whereRaw("BINARY text LIKE ?", ["%$query%"])->count();
    $total_clean_results_count = QuranTextClean::whereRaw("BINARY text LIKE ?", ["%$query%"])->count();

    return response()->json([
        'data' => $results->items(),
        'current_page' => $results->currentPage(),
        'last_page' => $results->lastPage(),
        'total_results_count' => $total_results_count, // Total original text results

        'clean_data' => $clean_results->items(),
        'clean_current_page' => $clean_results->currentPage(),
        'clean_last_page' => $clean_results->lastPage(),
        'total_clean_results_count' => $total_clean_results_count // Total clean text results
    ]);
}



   


//      public function analyzeAyahResults(Request $request)
// {
//     $query = $request->input('query');

//     // Perform the search in Quran
//     $results = Quran::whereRaw("BINARY text LIKE ?", ["%$query%"])->paginate(20);

//     // Now, search in the other tables for matches
//     $tables = [
//         'Conditionals' => Conditional::where('name', 'LIKE', "%$query%")->get(),
//         'Details' => Detail::where('name', 'LIKE', "%$query%")->get(),
//         'Negatives' => Negative::where('name', 'LIKE', "%$query%")->get(),
//         'Model Exceptions' => Exception::where('name', 'LIKE', "%$query%")->get(),
//         'Explanations' => Explanation::where('name', 'LIKE', "%$query%")->get(),
//         'Prepositions' => Preposition::where('name', 'LIKE', "%$query%")->get(),
//     ];

//       // Pass the results to the view
//       return view('quran.analyze_ayah_results', compact('results', 'tables'));

// }
public function analyzeAyahResults(Request $request)
{
    // Get the ayah_id and query from the request
    $ayaId = $request->input('aya_id');
    $query = $request->input('query'); // Get the query text from the AJAX request

    // Find the Ayah in the Quran table using the provided ID
    $ayah = QuranTextClean::where("index", "=", $ayaId)->first();

    // If the Ayah is not found, return an error
    if (!$ayah) {
        return response()->json(['error' => 'Ayah not found'], 404);
    }

    // Split the Ayah text into words
    $words = preg_split('/\s+/', $ayah->text); // Split by whitespace

    // Array to store matches
    $matches = [];

    // Define the tables to check
    $tables = [
        'أدوات الشرط' => Conditional::class,
        'أدوات التفضيل' => Detail::class,
        'أدوات النفي' => Negative::class,
        'أدوات الاستثناء' => Exception::class,
        'أدوات التوضيح' => Explanation::class,
        'أدوات الجر' => Preposition::class,
        'الضمائر' => Pronoun::class,
        'أدوات العطف' => Conjunction::class,
        'أدوات الاغراء والتحضيض' => EncouragementUrging::class,
        'أدوات السببية الوتعليل' => CausalReasoning::class,
        'أدوات التخصيص' => Specification::class,
        'أدوات الترتيب والتسلسل' => SequencingOrdering::class,
        'أدوات الاستنتاج' => ConclusionInference::class,
        'أدوات التزامن' => Synchronization::class,
    ];

    // Loop through each word to check for matches
    foreach ($words as $word) {
        $word = trim($word);  // Clean up any extra spaces

        // Step 1: Check for full word matches
        foreach ($tables as $tableName => $model) {
            $fullWordMatches = $model::whereRaw("BINARY name = ?", [$word])->get();
            foreach ($fullWordMatches as $match) {
                if (!isset($matches[$match->name])) {
                    $matches[$match->name] = [
                        'type' => 'fullWord', // Full word match type
                        'table' => $tableName, // Table name
                        'matched_words' => [], // Use 'matched_words' for full matches
                    ];
                }
                $matches[$match->name]['matched_words'][] = $word;
            }
        }

        // Step 2: Check for individual letter matches (first, second, third letter)
        for ($i = 0; $i < mb_strlen($word); $i++) {
            $letter = mb_substr($word, $i, 1, 'UTF-8');  // Extract individual letter
            foreach ($tables as $tableName => $model) {
                $letterMatches = $model::whereRaw("BINARY name = ?", [$letter])->get();
                foreach ($letterMatches as $match) {
                    if (!isset($matches[$match->name])) {
                        $matches[$match->name] = [
                            'type' => 'singleLetter', // Single letter match type
                            'table' => $tableName, // Table name
                            'matched_words' => [], // Use 'matched_words' for letter matches
                        ];
                    }
                    $matches[$match->name]['matched_words'][] = $word;
                }
            }
        }

        // Step 3: Check for letter combinations
        for ($i = 0; $i < mb_strlen($word) - 1; $i++) {
            $combination = mb_substr($word, $i, 2, 'UTF-8');  // Extract two-character combination
            foreach ($tables as $tableName => $model) {
                $combinationMatches = $model::whereRaw("BINARY name = ?", [$combination])->get();
                foreach ($combinationMatches as $match) {
                    if (!isset($matches[$match->name])) {
                        $matches[$match->name] = [
                            'type' => 'letterCombination', // Letter combination match type
                            'table' => $tableName, // Table name
                            'matched_words' => [], // Use 'matched_words' for combination matches
                        ];
                    }
                    $matches[$match->name]['matched_words'][] = $word;
                }
            }
        }

        // Step 4: Check for combinations of three letters (if word length allows)
        if (mb_strlen($word) > 2) {
            for ($i = 0; $i < mb_strlen($word) - 2; $i++) {
                $threeCharCombination = mb_substr($word, $i, 3, 'UTF-8');  // Extract three-character combination
                foreach ($tables as $tableName => $model) {
                    $threeCharMatches = $model::whereRaw("BINARY name = ?", [$threeCharCombination])->get();
                    foreach ($threeCharMatches as $match) {
                        if (!isset($matches[$match->name])) {
                            $matches[$match->name] = [
                                'type' => 'threeLetterCombination', // Three-letter combination match type
                                'table' => $tableName, // Table name
                                'matched_words' => [], // Use 'matched_words' for three-character matches
                            ];
                        }
                        $matches[$match->name]['matched_words'][] = $word;
                    }
                }
            }
        }
    }

    // Convert the matches array into a format that can be rendered
    $analysisResults = [];
    foreach ($matches as $matchName => $matchData) {
        $analysisResults[] = [
            'name' => $matchName,
            'type' => $matchData['type'],
            'table' => $matchData['table'],
            'matched_words' => $matchData['matched_words'], // All matched words will go into this key
        ];
    }

    // Return the results as JSON
    return response()->json([
        'analysis' => 'تم التحليل بنجاح',
        'results' => $analysisResults,
    ]);
}










       // New method to render the analysis view
    public function showAnalysisResults(Request $request)
    {
        $query = $request->input('query');
        return view('quran.analysis', compact('query'));
    }
     
}

