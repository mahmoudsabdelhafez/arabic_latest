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
use App\Models\Demonstrative;
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
use App\Models\RelativePronoun;
use App\Models\SequencingOrdering;
use App\Models\Specification;
use App\Models\Suffix;
use App\Models\Synchronization;
use App\Models\ToolName;

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
    $categories = $request->input('categories', []);

    $ayah = QuranTextClean::where("index", $ayaId)->first();
    if (!$ayah) {
        return response()->json(['error' => 'Ayah not found'], 404);
    }

    $words = preg_split('/\s+/', trim($ayah->text));
    $matches = [];

    // جلب الأدوات من tool_names مع بياناتها من connectives
    $tools = ToolName::with(['connective' => function ($query) use ($categories) {
            if (!empty($categories)) {
                $query->whereIn('category_id', $categories);
            }
        }])->get();

    $categoryNames = ConnectiveCategory::whereIn('id', $tools->pluck('connective.category_id')->unique())
        ->pluck('arabic_name', 'id')
        ->toArray();

    $tools = $tools->keyBy('name');

    // جلب الضمائر
    $pronouns = Pronoun::get(['id', 'name', 'definition'])->keyBy('id');
    $pronounNames = $pronouns->pluck('name', 'id')->toArray();

    // جلب أسماء الإشارة
    $demonstratives = Demonstrative::get(['id', 'name', 'definition'])->keyBy('id');
    $demonstrativeNames = $demonstratives->pluck('name', 'id')->toArray();

    // جلب أسماء الموصول
    $relativePronouns = RelativePronoun::get(['id', 'surface_form', 'notes'])->keyBy('id');
    $relativePronounForms = $relativePronouns->pluck('surface_form', 'id')->toArray();

    foreach ($words as $word) {
        $word = trim($word);

        // البحث في الأدوات
        if (isset($tools[$word])) {
            $tool = $tools[$word];
            if ($tool->connective_form === 'standalone' && $tool->connective) {
                $matches[$word] = $this->formatMatch(
                    $word,
                    'fullWord',
                    $categoryNames[$tool->connective->category_id] ?? 'الأدوات',
                    $tool->connective->definition,
                    $word
                );
            }
        }

        // البحث في الضمائر
        if (in_array($word, $pronounNames, true)) {
            $pronounId = array_search($word, $pronounNames);
            $matches[$word] = $this->formatMatch($word, 'fullWord', 'الضمائر', $pronouns[$pronounId]->definition ?? '', $word);
        }

        // البحث في أسماء الإشارة
        if (in_array($word, $demonstrativeNames, true)) {
            $demonstrativeId = array_search($word, $demonstrativeNames);
            $matches[$word] = $this->formatMatch($word, 'fullWord', 'أسماء الإشارة', $demonstratives[$demonstrativeId]->definition ?? '', $word);
        }

        // البحث في أسماء الموصول
        if (in_array($word, $relativePronounForms, true)) {
            $relativePronounId = array_search($word, $relativePronounForms);
            $matches[$word] = $this->formatMatch($word, 'fullWord', 'أسماء الموصول', $relativePronouns[$relativePronounId]->notes ?? '', $word);
        }

        // تحليل التركيبات داخل الكلمات
        $wordLength = mb_strlen($word);
        for ($i = 0; $i < $wordLength; $i++) {
            for ($j = $i + 1; $j <= $wordLength; $j++) {
                $combination = mb_substr($word, $i, $j - $i, 'UTF-8');
                $position = $i === 0 ? 'start' : ($j === $wordLength ? 'end' : 'middle');

                if (isset($tools[$combination])) {
                    $tool = $tools[$combination];
                    if ($tool->connective && $tool->connective->position === $position && $tool->connective_form === 'connected') {
                        $matches[$combination] = $this->formatMatch(
                            $combination,
                            'letterCombination',
                            $categoryNames[$tool->connective->category_id] ?? 'الأدوات',
                            $tool->connective->definition,
                            $word
                        );
                    }
                }

                // البحث في الضمائر
                if (in_array($combination, $pronounNames, true)) {
                    $pronounId = array_search($combination, $pronounNames);
                    $matches[$combination] = $this->formatMatch($combination, 'letterCombination', 'الضمائر', $pronouns[$pronounId]->definition ?? '', $word);
                }

                // البحث في أسماء الإشارة
                if (in_array($combination, $demonstrativeNames, true)) {
                    $demonstrativeId = array_search($combination, $demonstrativeNames);
                    $matches[$combination] = $this->formatMatch($combination, 'letterCombination', 'أسماء الإشارة', $demonstratives[$demonstrativeId]->definition ?? '', $word);
                }

                // البحث في أسماء الموصول
                if (in_array($combination, $relativePronounForms, true)) {
                    $relativePronounId = array_search($combination, $relativePronounForms);
                    $matches[$combination] = $this->formatMatch($combination, 'letterCombination', 'أسماء الموصول', $relativePronouns[$relativePronounId]->notes ?? '', $word);
                }
            }
        }
    }

    // تجميع النتائج حسب الفئة
    $categorizedResults = [];
    foreach ($matches as $match) {
        $categorizedResults[$match['table']][] = $match;
    }

    return response()->json([
        'analysis' => 'تم التحليل بنجاح',
        'results' => $categorizedResults
    ]);
}

private function formatMatch($name, $type, $table, $definition, $matchedWord = null)
{
    return [
        'type' => $type,
        'table' => $table,
        'matched_words' => [$matchedWord],
        'name' => $name,
        'definition' => $definition
    ];
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

