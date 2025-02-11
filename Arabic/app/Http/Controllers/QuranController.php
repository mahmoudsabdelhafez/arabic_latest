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
        $results = Quran::whereRaw("BINARY text LIKE ?", ["%$query%"])->paginate(20);
        return response()->json($results);
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
    $ayah = Quran::where("index", "=", $ayaId)->first();

    // If the Ayah is not found, return an error
    if (!$ayah) {
        return response()->json(['error' => 'Ayah not found'], 404);
    }

    // Split the Ayah text into words
    $words = preg_split('/\s+/', $ayah->text); // Split by whitespace

    // Array to store matches grouped by match name
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
        // 'أدوات المقارنة والتشبيه' => ComparisonSimile::class,
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
        // Trim any potential unwanted characters
        $word = trim($word);

        // Step 1: Check for prefix matches (first two letters)
        $prefix = mb_substr($word, 0, 2, 'UTF-8'); // Handle Arabic characters correctly
        if (mb_strlen($word) > 1) { // Only check for prefix if the word has more than one character
            foreach ($tables as $tableName => $model) {
                // Check for prefix matches
                $prefixMatches = $model::whereRaw("BINARY name = ?", [$prefix])->get();
                foreach ($prefixMatches as $match) {
                    if (!isset($matches[$match->name])) {
                        $matches[$match->name] = [
                            'type' => 'prefix', 
                            'table' => $tableName, 
                            'words' => []
                        ];
                    }
                    $matches[$match->name]['words'][] = $word; // Add word to the group of this match
                }
            }
        }

        // Step 2: Check for three-character matches (first three letters)
        $threeCharPrefix = mb_substr($word, 0, 3, 'UTF-8'); // Handle first 3 characters
        if (mb_strlen($word) > 2) { // Only check for three-character prefix if the word has more than two characters
            foreach ($tables as $tableName => $model) {
                // Check for three-character prefix matches
                $threeCharMatches = $model::whereRaw("BINARY name = ?", [$threeCharPrefix])->get();
                foreach ($threeCharMatches as $match) {
                    if (!isset($matches[$match->name])) {
                        $matches[$match->name] = [
                            'type' => 'threeCharPrefix', 
                            'table' => $tableName, 
                            'words' => []
                        ];
                    }
                    $matches[$match->name]['words'][] = $word; // Add word to the group of this match
                }
            }
        }

        // Step 3: Check for full word matches
        foreach ($tables as $tableName => $model) {
            // Check for full word matches
            $fullWordMatches = $model::whereRaw("BINARY name = ?", [$word])->get();
            foreach ($fullWordMatches as $match) {
                if (!isset($matches[$match->name])) {
                    $matches[$match->name] = [
                        'type' => 'fullWord', 
                        'table' => $tableName, 
                        'words' => []
                    ];
                }
                $matches[$match->name]['words'][] = $word; // Add word to the group of this match
            }
        }

                // Step 4: Check for last two-character matches
        $lastTwoChars = mb_substr($word, -2, 2, 'UTF-8'); // Handle last 2 characters
        if (mb_strlen($word) > 1) { // Only check for last two characters if the word has more than one character
            foreach ($tables as $tableName => $model) {
                
                // Exclude Preposition table from this check
                if ($tableName === 'أدوات الجر') {
                    continue; // Skip this iteration for Preposition table
                }

                // Check for last two characters matches
                $lastTwoMatches = $model::whereRaw("BINARY name = ?", [$lastTwoChars])->get();
                foreach ($lastTwoMatches as $match) {
                    if (!isset($matches[$match->name])) {
                        $matches[$match->name] = [
                            'type' => 'lastTwoChars', 
                            'table' => $tableName, 
                            'words' => []
                        ];
                    }
                    $matches[$match->name]['words'][] = $word; // Add word to the group of this match
                }
            }
        }


        // Step 5: Check for last three-character matches
        $lastThreeChars = mb_substr($word, -3, 3, 'UTF-8'); // Handle last 3 characters
        if (mb_strlen($word) > 2) { // Only check for last three characters if the word has more than two characters
            foreach ($tables as $tableName => $model) {
                // Check for last three characters matches
                $lastThreeMatches = $model::whereRaw("BINARY name = ?", [$lastThreeChars])->get();
                foreach ($lastThreeMatches as $match) {
                    if (!isset($matches[$match->name])) {
                        $matches[$match->name] = [
                            'type' => 'lastThreeChars', 
                            'table' => $tableName, 
                            'words' => []
                        ];
                    }
                    $matches[$match->name]['words'][] = $word; // Add word to the group of this match
                }
            }
        }
    }

    // Convert the matches array into a format that can be rendered
    $analysisResults = [];
    foreach ($matches as $matchName => $matchData) {
        // Organize the matches by type and table, and group all matching words
        $analysisResults[] = [
            'name' => $matchName,
            'type' => $matchData['type'],
            'table' => $matchData['table'],
            'matched_words' => $matchData['words'], // Group words by matching name
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

