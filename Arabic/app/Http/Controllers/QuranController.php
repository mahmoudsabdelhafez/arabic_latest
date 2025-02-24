<?php

namespace App\Http\Controllers;

use App\Models\ArabicLetter;
use App\Models\CausalReasoning;
use App\Models\ComparisonSimile;
use App\Models\ConclusionInference;
use App\Models\Conditional;
use App\Models\Conjunction;
use App\Models\Connective;
use App\Models\ConnectiveCategory;
use App\Models\Detail;
use App\Models\EncouragementUrging;
use App\Models\Exception;
use App\Models\Explanation;
use App\Models\Negative;
use App\Models\Phoneme;
use App\Models\Preposition;
use App\Models\Pronoun;
use Illuminate\Http\Request;
use App\Models\Quran;
use App\Models\QuranAll;
use App\Models\QuranTextClean;
use App\Models\SequencingOrdering;
use App\Models\Specification;
use App\Models\Suffix;
use App\Models\Synchronization;

class QuranController extends Controller
{

    public function show()
    {
        $categories = ConnectiveCategory::all();
        return view('quran.index', compact('categories'));
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
    $ayaId = $request->input('aya_id');
    // $categories = $request->input('categories', []);  // Get the selected categories

    $ayah = QuranAll::where("index", $ayaId)->first();

    if (!$ayah) {
        return response()->json(['error' => 'Ayah not found'], 404);
    }

    $words = preg_split('/\s+/', trim($ayah->text));
    $matches = [];

    // Fetch connectives filtered by category_id
    $query = Connective::query();

    if (!empty($categories)) {
        $query->whereIn('category_id', $categories);  // Filter by selected categories
    }
    // dd();
    // Fetch connectives along with definitions and category_id
    $connectives = $query->get(['id', 'name', 'definition', 'category_id', 'position', 'connective_form'])->keyBy('id');

    // Fetch category Arabic names
    $categoryNames = ConnectiveCategory::whereIn('id', $connectives->pluck('category_id')->unique())
        ->pluck('arabic_name', 'id')
        ->toArray();

    // Fetch pronouns
    $pronouns = Pronoun::pluck('name', 'id')->toArray();
    $pronounsWithDefinitions = Pronoun::whereIn('id', array_keys($pronouns))
        ->get(['id', 'name', 'definition'])
        ->keyBy('id');

    //===============================================================================
    foreach ($words as $word) {
        $word = trim($word);

        // Check full-word match for connectives (only where connective_form = 'standalone')
        foreach ($connectives as $connectiveId => $connective) {
            if ($word == $connective->name && $connective->connective_form == 'standalone') {
                $categoryName = $categoryNames[$connective->category_id] ?? 'الادوات'; // Default if not found
                $matches[$word] = [
                    'type' => 'fullWord',
                    'table' => $categoryName, // Use category Arabic name
                    'matched_words' => [$word],
                    'name' => $word,
                    'definition' => $connective->definition ?? ''
                ];
            }
        }

        // Check full-word match for pronouns
        if (in_array($word, $pronouns, true)) {
            $pronounId = array_search($word, $pronouns);
            $matches[$word] = [
                'type' => 'fullWord',
                'table' => 'الضمائر',
                'matched_words' => [$word],
                'name' => $word,
                'definition' => $pronounsWithDefinitions[$pronounId]->definition ?? ''
            ];
        }

        // Check for any substring match in connectives (only where connective_form = 'connected')
        for ($i = 0; $i < mb_strlen($word); $i++) {
            for ($j = $i + 1; $j <= mb_strlen($word); $j++) {
                $combination = mb_substr($word, $i, $j - $i, 'UTF-8');
                
                // Determine the position of the substring
                $position = 'middle'; // Default position
                if ($i === 0) {
                    $position = 'start'; // Start of the word
                } elseif ($j === mb_strlen($word)) {
                    $position = 'end'; // End of the word
                }

                // Loop through connectives to find a match (only where connective_form = 'connected')
                foreach ($connectives as $connectiveId => $connective) {
                    if ($combination === $connective->name && $connective->position === $position && $connective->connective_form === 'connected') {
                        $categoryName = $categoryNames[$connective->category_id] ?? 'الادوات'; // Default if not found

                        // Only add if it's not already in matches
                        if (!isset($matches[$combination])) {
                            $matches[$combination] = [
                                'type' => 'letterCombination',
                                'table' => $categoryName, // Use category Arabic name
                                'matched_words' => [],
                                'name' => $combination,
                                'definition' => $connective->definition ?? ''
                            ];
                        }
                        $matches[$combination]['matched_words'][] = $word;
                    }
                }

                // Check for pronoun combination
                if (in_array($combination, $pronouns, true)) {
                    $pronounId = array_search($combination, $pronouns);
                    if (!isset($matches[$combination])) {
                        $matches[$combination] = [
                            'type' => 'letterCombination',
                            'table' => 'الضمائر',
                            'matched_words' => [],
                            'name' => $combination,
                            'definition' => $pronounsWithDefinitions[$pronounId]->definition ?? ''
                        ];
                    }
                    $matches[$combination]['matched_words'][] = $word;
                }
            }
        }
    }

    $analysisResults = array_values($matches);
    return response()->json(['analysis' => 'تم التحليل بنجاح', 'results' => $analysisResults]);
}






// public function getPhonemeDetailsForLetter(Request $request)
// {
//     $letter = $request->input('letter'); // Receive the letter from the frontend

//     // Fetch the Arabic letter record from arabic_letters table based on the letter
//     $arabicLetter = ArabicLetter::where('letter', $letter)->first();

//     if (!$arabicLetter) {
//         return response()->json(['error' => 'Arabic letter not found'], 404);
//     }

//     // Fetch the phoneme details from the phonemes table based on arabic_letter_id
//     $phoneme = Phoneme::where('arabic_letter_id', $arabicLetter->id)->first();

//     if (!$phoneme) {
//         return response()->json(['error' => 'Phoneme not found'], 404);
//     }

//     // Return phoneme details
//     return response()->json([
//         'letter' => $letter,
//         'ipa' => $phoneme->ipa,
//         'type' => $phoneme->type,
//         'place_of_articulation' => $phoneme->place_of_articulation,
//         'manner_of_articulation' => $phoneme->manner_of_articulation,
//         'voicing' => $phoneme->voicing,
//         'sound_effects' => $phoneme->sound_effects,
//         'notes' => $phoneme->notes,
//         'articulation_arabic_name' => $phoneme->articulation_arabic_name,
//     ]);
// }



// for analysis options (check boxes)
public function showAnalysisOptions()
{
    $categories = ConnectiveCategory::all(); // Fetch all categories
    return view('quran.index', compact('categories'));
}


public function getArabicLetterId(Request $request)
{
    $letter = $request->input('letter'); // Receive the letter from the frontend

    // Fetch the Arabic letter record from the arabic_letters table based on the letter
    $arabicLetter = ArabicLetter::where('letter', $letter)->first();

    if (!$arabicLetter) {
        return response()->json(['error' => 'Arabic letter not found'], 404);
    }

    // Return the Arabic letter ID
    return response()->json([
        'letter_id' => $arabicLetter->id
    ]);
}



public function getPhonemeDetailsForLetter(Request $request)
{
    $letterId = $request->input('letter_id'); // Receive the letter ID from the frontend

    // Fetch the phoneme details from the phonemes table based on arabic_letter_id
    $phoneme = Phoneme::where('arabic_letter_id', $letterId)->first();

    if (!$phoneme) {
        return response()->json(['error' => 'Phoneme not found'], 404);
    }

    // Return phoneme details
    return response()->json([
        'letter' => $phoneme->arabicLetter->letter ?? 'N/A',
        'ipa' => $phoneme->ipa ?? 'N/A',
        'type' => $phoneme->type ?? 'N/A',
        'place_of_articulation' => $phoneme->place_of_articulation ?? 'N/A',
        'manner_of_articulation' => $phoneme->manner_of_articulation ?? 'N/A',
        'sound_effects' => $phoneme->sound_effects ?? 'N/A',
        'notes' => $phoneme->notes ?? 'N/A',
        'articulation_arabic_name' => $phoneme->articulation_arabic_name ?? 'N/A'
    ]);
}
















       // New method to render the analysis view
    public function showAnalysisResults(Request $request)
    {
        $query = $request->input('query');
        return view('quran.analysis', compact('query'));
    }
     
}

