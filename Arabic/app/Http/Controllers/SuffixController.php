<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pronoun;


class SuffixController extends Controller
{
    // Display the form for inputting a verb
    public function index()
    {
        $pronouns = Pronoun::with('sawabeqs')->get();
        // $pronouns = Pronoun::with(['sawabeqs', 'suffixes'])->get();

        // dd($pronouns);

        return view('prefix_suffix.verb',compact('pronouns')); // Create a Blade view named verb_form.blade.php
    }

    // Process the input verb and return results
//     public function processVerb(Request $request)
//     {
//         $request->validate([
//             'verb' => 'required|string',
//         ]);

//         $verb = $request->input('verb');

//         // List of common suffixes
//         $suffixes = ['ت', 'نا', 'وا', 'ين', 'ون', 'ا', 'ي', 'ة', 'ن', 'تم', 'كن', 'هما', 'هن', 'كم', 'كن'];

//         // List of common prefixes
//         $prefixes = ['أ', 'ن', 'ي', 'ت', 'س', 'ل'];

//         // List of harakat (diacritics)
//         $harakat = ['َ', 'ُ', 'ِ', 'ً', 'ٌ', 'ٍ', 'ّ', 'ْ'];

//         // Attach prefixes, suffixes, and harakat to the root verb
//         $results = [];
//         foreach ($prefixes as $prefix) {
//             $results[] = $prefix . $verb;
//             foreach ($harakat as $haraka) {
//                 $results[] = $prefix . $verb . $haraka;
//             }
//         }
//         foreach ($suffixes as $suffix) {
//             $results[] = $verb . $suffix;
//             foreach ($harakat as $haraka) {
//                 $results[] = $verb . $haraka . $suffix;
//             }
//         }
//         foreach ($prefixes as $prefix) {
//             foreach ($suffixes as $suffix) {
//                 $results[] = $prefix . $verb . $suffix;
//                 foreach ($harakat as $haraka) {
//                     $results[] = $prefix . $verb . $haraka . $suffix;
//                 }
//             }
//         }

//         return view('prefix_suffix.verb-results', ['verb' => $verb, 'results' => $results]); // Create a Blade view named verb_results.blade.php
//     }
// }
// public function processVerb(Request $request)
// {
//     $request->validate([
//         'verb' => 'required|string',
//     ]);

//     $verb = $request->input('verb');

//     // Conjugation templates for each pronoun
//     $pronouns = [
//         'أنا' => [
//             "{$verb}تُ", "أ{$verb}", "أ{$verb}ْ", "أ{$verb}َ", "أ{$verb}َنَّ",
//              "أُ{$verb}", "أُ{$verb}ْ", "أُ{$verb}َ", "أُ{$verb}َنَّ"
//         ],
//         'نحن' => [
//             "{$verb}نَا", "ن{$verb}", "ن{$verb}ْ", "ن{$verb}َ", "ن{$verb}َنَّ", 
//             "نُ{$verb}", "نُ{$verb}ْ", "نُ{$verb}َ", "نُ{$verb}َنَّ"
//         ],
//         'أنت' => [
//             "{$verb}تَ", "ت{$verb}", "ت{$verb}ْ", "ت{$verb}َ", "ت{$verb}َنَّ", 
//             "ا{$verb}ْ", "ا{$verb}َنَّ", "تُ{$verb}", "تُ{$verb}ْ", 
//             "تُ{$verb}َ", "تُ{$verb}َنَّ"
//         ],
//         'أنتِ' => [
//             "{$verb}تِ", "ت{$verb}ِينَ", "ت{$verb}ِي", "ت{$verb}ِي", "ت{$verb}نَّ", 
//             "ا{$verb}ِي", "ا{$verb}نَّ", "تُ{$verb}ِينَ", "تُ{$verb}ِي", 
//             "تُ{$verb}ِي", "تُ{$verb}نَّ"
//         ],
//         'أنتم' => [
//             "{$verb}تُم", "ت{$verb}ونَ", "ت{$verb}وا", "ت{$verb}وا", "ت{$verb}نَّ", 
//             "ا{$verb}وا", "ا{$verb}نَّ", "تُ{$verb}ونَ", "تُ{$verb}وا", 
//             "تُ{$verb}وا", "تُ{$verb}نَّ"
//         ],
//         'أنتن' => [
//             "{$verb}تُنَّ", "ت{$verb}نَ", "ت{$verb}نَ", "ت{$verb}نَ",
//             "ا{$verb}نَ",  "تُ{$verb}نَ", "تُ{$verb}نَ", 
//             "تُ{$verb}نَ", 
//         ],
//         'هو' => [
//             "{$verb}َ", "ي{$verb}", "ي{$verb}ْ", "ي{$verb}َ", "ي{$verb}َنَّ", 
//             "يُ{$verb}", "يُ{$verb}ْ", "يُ{$verb}َ", "يُ{$verb}َنَّ"
//         ],
//         'هي' => [
//             "{$verb}َتْ", "ت{$verb}", "ت{$verb}ْ", "ت{$verb}َ", "ت{$verb}َنَّ", 
//             "تُ{$verb}", "تُ{$verb}ْ", "تُ{$verb}َ", "تُ{$verb}َنَّ"
//         ],
//         'هم' => [
//             "{$verb}وا", "ي{$verb}ونَ", "ي{$verb}وا", "ي{$verb}وا", "ي{$verb}نَّ", 
//             "يُ{$verb}ونَ", "يُ{$verb}وا", "يُ{$verb}وا", "يُ{$verb}نَّ"
//         ],
//         'هن' => [
//             "{$verb}نَ", "ي{$verb}نَ", "ي{$verb}نَ", "ي{$verb}نَ", 
//          "يُ{$verb}نَ", "يُ{$verb}نَ", "يُ{$verb}نَ",
//         ],
//     ];

//     return view('prefix_suffix.verb-results', ['verb' => $verb, 'pronouns' => $pronouns]);
// }

public function processVerb(Request $request)
    {
        $request->validate([
            'verb' => 'required|string',
        ]);

        $verb = $request->input('verb');

        $presentVerbSocon = $this->presentSocon($verb);
        $presentVerbDama = $this->presentDama($verb);
        $presentVerbFatha = $this->presentFatha($verb);
        $modifiedVerb = $verb;

        // Conjugation templates for each pronoun
        $pronouns = [
            'أنا' => [
                "{$this->presentSocon($verb)}تُ", "أ{$modifiedVerb}", "أ{$modifiedVerb}ْ", "أ{$modifiedVerb}َ", "أ{$modifiedVerb}َنَّ", 
                 "أُ{$modifiedVerb}", "أُ{$modifiedVerb}ْ", "أُ{$modifiedVerb}َ", "أُ{$modifiedVerb}َنَّ"
            ],
            'نحن' => [
                "{$presentVerbSocon}نَا", "ن{$modifiedVerb}", "ن{$modifiedVerb}ْ", "ن{$modifiedVerb}َ", "ن{$modifiedVerb}َنَّ", 
                 "نُ{$modifiedVerb}", "نُ{$modifiedVerb}ْ", "نُ{$modifiedVerb}َ", "نُ{$modifiedVerb}َنَّ"
            ],
            'أنت' => [
                "{$presentVerbSocon}تَ", "ت{$modifiedVerb}", "ت{$modifiedVerb}ْ", "ت{$modifiedVerb}َ", "ت{$modifiedVerb}َنَّ", 
                "ا{$modifiedVerb}ْ", "ا{$modifiedVerb}َنَّ","تُ{$modifiedVerb}", "تُ{$modifiedVerb}ْ", 
                "تُ{$modifiedVerb}َ", "تُ{$modifiedVerb}َنَّ"
            ],
            'أنتِ' => [
                "{$presentVerbSocon}تِ", "ت{$modifiedVerb}ِينَ", "ت{$modifiedVerb}ِي", "ت{$modifiedVerb}ِي", "ت{$modifiedVerb}نَّ", 
                "ا{$modifiedVerb}ِي", "ا{$modifiedVerb}نَّ", "تُ{$modifiedVerb}ِينَ", "تُ{$modifiedVerb}ِي", 
                "تُ{$modifiedVerb}ِي", "تُ{$modifiedVerb}نَّ"
            ],
            'أنتم' => [
                "{$presentVerbSocon}تُم", "ت{$modifiedVerb}ونَ", "ت{$modifiedVerb}وا", "ت{$modifiedVerb}وا", "ت{$modifiedVerb}نَّ", 
                "ا{$modifiedVerb}وا", "ا{$modifiedVerb}نَّ",  "تُ{$modifiedVerb}ونَ", "تُ{$modifiedVerb}وا", 
                "تُ{$modifiedVerb}وا", "تُ{$modifiedVerb}نَّ"
            ],
            'أنتن' => [
                "{$presentVerbSocon}تُنَّ", "ت{$modifiedVerb}نَ", "ت{$modifiedVerb}نَ", "ت{$modifiedVerb}نَ", 
                "ا{$modifiedVerb}نَ", "تُ{$modifiedVerb}نَ", "تُ{$modifiedVerb}نَ", 
                "تُ{$modifiedVerb}نَ", 
            ],
            'هو' => [
                "{$presentVerbFatha}َ", "ي{$modifiedVerb}", "ي{$modifiedVerb}ْ", "ي{$modifiedVerb}َ", "ي{$modifiedVerb}َنَّ", 
                 "يُ{$modifiedVerb}", "يُ{$modifiedVerb}ْ", "يُ{$modifiedVerb}َ", "يُ{$modifiedVerb}َنَّ"
            ],
            'هي' => [
                "{$presentVerbFatha}َتْ", "ت{$modifiedVerb}", "ت{$modifiedVerb}ْ", "ت{$modifiedVerb}َ", "ت{$modifiedVerb}َنَّ", 
                 "تُ{$modifiedVerb}", "تُ{$modifiedVerb}ْ", "تُ{$modifiedVerb}َ", "تُ{$modifiedVerb}َنَّ"
            ],
            'هم' => [
                "{$presentVerbDama}وا", "ي{$modifiedVerb}ونَ", "ي{$modifiedVerb}وا", "ي{$modifiedVerb}وا", "ي{$modifiedVerb}نَّ", 
                 "يُ{$modifiedVerb}ونَ", "يُ{$modifiedVerb}وا", "يُ{$modifiedVerb}وا", "يُ{$modifiedVerb}نَّ"
            ],
            'هن' => [
                "{$presentVerbSocon}نَ", "ي{$modifiedVerb}نَ", "ي{$modifiedVerb}نَ", "ي{$modifiedVerb}نَ", 
                 "يُ{$modifiedVerb}نَ", "يُ{$modifiedVerb}نَ", "يُ{$modifiedVerb}نَ", 
            ],
            'هما' => [
                "{$presentVerbFatha}نَ", "ي{$modifiedVerb}نَ", "ي{$modifiedVerb}نَ", "ي{$modifiedVerb}نَ", 
                "يُ{$modifiedVerb}نَ", "يُ{$modifiedVerb}نَ", "يُ{$modifiedVerb}نَ", 
            ],
        ];

        return view('prefix_suffix.verb-results', ['verb' => $verb, 'pronouns' => $pronouns]);
    }


    
    // public function presentDama($verb){
    //     // Split the verb into its characters
    //     $letters = mb_str_split($verb); // This splits the verb into an array of individual characters

    //     // Check if the verb has at least 3 characters
    //     if (count($letters) < 3) {
    //         return redirect()->back()->with('error', 'Please enter a verb with at least 3 characters.');
    //     }

    //     // Add diacritics to the first 3 letters
    //     $letters[0] .= 'ْ'; // Add fatha (َ) to the first letter
    //     $letters[1] .= 'ُ'; // Add damma (ُ) to the second letter
    //     $letters[2] .= 'ُ'; // Add sukun (ْ) to the third letter
    //     $modifiedVerb = implode('', $letters);
    //     // Reassemble the verb with the diacritics added to the first three letters
    //     return $modifiedVerb;
    // }
    // public function presentFatha($verb){
    //     // Split the verb into its characters
    //     $letters = mb_str_split($verb); // This splits the verb into an array of individual characters

    //     // Check if the verb has at least 3 characters
    //     if (count($letters) < 3) {
    //         return redirect()->back()->with('error', 'Please enter a verb with at least 3 characters.');
    //     }

    //     // Add diacritics to the first 3 letters
    //     $letters[0] .= 'ْ'; // Add fatha (َ) to the first letter
    //     $letters[1] .= 'ُ'; // Add damma (ُ) to the second letter
    //     $letters[2] .= 'َ'; // Add sukun (ْ) to the third letter
    //     $modifiedVerb = implode('', $letters);
    //     // Reassemble the verb with the diacritics added to the first three letters
    //     return $modifiedVerb;
    // }
    // public function pastCasra($verb){
    //     // Split the verb into its characters
    //     $letters = mb_str_split($verb); // This splits the verb into an array of individual characters

    //     // Check if the verb has at least 3 characters
    //     if (count($letters) < 3) {
    //         return redirect()->back()->with('error', 'Please enter a verb with at least 3 characters.');
    //     }

    //     // Add diacritics to the first 3 letters
    //     $letters[0] .= 'ْ'; // Add fatha (َ) to the first letter
    //     $letters[1] .= 'ُ'; // Add damma (ُ) to the second letter
    //     $letters[2] .= 'ِ'; // Add sukun (ْ) to the third letter
    //     $modifiedVerb = implode('', $letters);
    //     // Reassemble the verb with the diacritics added to the first three letters
    //     return $modifiedVerb;
    // }

    // public function applyPrefixesAndSuffixesToVerb(Request $request)
    // {
    //     // التحقق من صحة الإدخال
    //     $request->validate([
    //         'verb' => 'required|string|max:255', // الفعل المدخل
    //     ]);
    
    //     // جلب جميع الضمائر مع السوابق واللواحق
    //     $pronouns = Pronoun::with(['sawabeqs', 'suffixes'])->get();
    
    //     // قائمة للنتائج
    //     $results = [];
    
    //     foreach ($pronouns as $pronoun) {
    //         foreach ($pronoun->sawabeqs as $sawabeq) {
    //             if($pronoun->id == 5 ||$pronoun->id == 10 ){
    //                 $varb =  $this->presentFatha($request->verb);
    //              }elseif($pronoun->id ==7 ||$pronoun->id == 12){
    //                  $varb =  $this->presentSocon($request->verb);
    //              }elseif($pronoun->id ==4){
    //                  $varb =  $this->pastCasra($request->verb);
    //              }else{
    //                  $varb =  $this->presentDama($request->verb);
    //              }
    //             // إذا كان هناك لواحق، أضفها
    //             if ($pronoun->suffixes->isNotEmpty()) {
                    
    //                 foreach ($pronoun->suffixes as $suffix) {
    //                     $results[] = [
    //                         'pronoun' => $pronoun->pronoun,
    //                         'prefix' => $sawabeq->name,
    //                         'suffix' => $suffix->formula,
    //                         'result' => $sawabeq->name . $varb . $suffix->formula,
    //                     ];
    //                 }
    //             } else {
    //                 // إذا لم يكن هناك لواحق، أضف الفعل مع السابق فقط
    //                 $results[] = [
    //                     'pronoun' => $pronoun->pronoun,
    //                     'prefix' => $sawabeq->name,
    //                     'suffix' => null,
    //                     'result' => $sawabeq->name . $varb,
    //                 ];
    //             }
    //         }
    //     }
    
    //     // إعادة النتائج كاستجابة JSON
    //     return response()->json($results);
    // }

    public function past($verb,$pronounId){
        $letters = mb_str_split($verb); // This splits the verb into an array of individual characters
        if (count($letters) < 3) {
            return redirect()->back()->with('error', 'Please enter a verb with at least 3 characters.');
        }

        // Add diacritics to the first 3 letters فَعَلْ
        $letters[0] .= 'َ'; // Add fatha (َ) to the first letter
        $letters[1] .= 'َ'; // Add fatha (ُ) to the second letter

        if($pronounId == 8 || $pronounId == 9 || $pronounId == 10){
            $letters[2] .= 'َ'; // Add fatha (ُ) to the second letter
        }elseif($pronounId == 11){
            $letters[2] .= 'ُ'; // Add fatha (ُ) to the second letter
        }else{
            $letters[2] .= 'ْ'; // Add fatha (ُ) to the second letter
        }
        $modifiedVerb = implode('', $letters);
        // dd(mb_str_split($modifiedVerb)); //=> arr.length = 6 and the verb has 3 characters بدون الشدّة
        // Reassemble the verb with the diacritics added to the first three letters
        return $modifiedVerb;
    }
    public function present($verb,$pronounId){

        // Split the verb into its characters
        $letters = mb_str_split($verb); // This splits the verb into an array of individual characters

        // Check if the verb has at least 3 characters
        if (count($letters) < 3) {
            return redirect()->back()->with('error', 'Please enter a verb with at least 3 characters.');
        }

        // Add diacritics to the first 3 letters فَعَلْ
        $letters[0] .= 'ْ'; // Add socon (َ) to the first letter
        $letters[1] .= 'ُ'; // Add damma (ُ) to the second letter

        if($pronounId == 7 || $pronounId == 12 ){
            $letters[2] .= 'ْ'; // Add socon (ُ) to the second letter
        }elseif($pronounId == 5 || $pronounId == 10){
            $letters[2] .= 'َ'; // Add fatha (ُ) to the second letter
        }elseif($pronounId == 4){
            $letters[2] .= 'ِ'; // Add casra (ُ) to the second letter
        }else{
            $letters[2] .= 'ُ'; // Add dama (ُ) to the second letter
        }

        $modifiedVerb = implode('', $letters);

        if (mb_substr($modifiedVerb, 0, 1) == 'و') {
            $modifiedVerb = mb_substr($modifiedVerb, 2); // حذف الحرف الأول 'و'
        }
        // dd(mb_str_split($modifiedVerb)); //=> arr.length = 6 and the verb has 3 characters بدون الشدّة
        // Reassemble the verb with the diacritics added to the first three letters
        return $modifiedVerb;
    }
    
    public function applyPrefixesAndSuffixesToVerb(Request $request)
{
    // التحقق من صحة الإدخال
    $request->validate([
        'verb' => 'required|string|max:255', // الفعل المدخل
    ]);

    // $varb = $request->verb;
    // جلب جميع الضمائر مع السوابق واللواحق
    $pronouns = Pronoun::with(['sawabeqs', 'suffixes'])->get();

    $results = [];

    foreach ($pronouns as $pronoun) {
        $modaraResult = null;
        $amrResult = null;
        $madiResult = null;

        foreach ($pronoun->sawabeqs as $sawabeq) {
            // فصل الأنواع في السوابق
            $types = explode(' - ', $sawabeq->type);
        
            // تحقق من النوع "مضارع"
            if (in_array('حروف مضارعة', $types)) {
                $suffix = $pronoun->suffixes->first(function ($suffix) {
                    $suffixTypes = explode(' - ', $suffix->type); // فصل الأنواع في اللواحق
                    return in_array('مضارع', $suffixTypes); // تحقق من وجود "مضارع"
                });
                $varb = $this->present($request->verb,$pronoun->id);
                $modaraResult = $sawabeq->name . $varb . ($suffix ? $suffix->formula : '');
            }
        
            // تحقق من النوع "أمر"
            if (in_array('أمر', $types)) {
                $suffix = $pronoun->suffixes->first(function ($suffix) {
                    $suffixTypes = explode(' - ', $suffix->type); // فصل الأنواع في اللواحق
                    return in_array('أمر', $suffixTypes); // تحقق من وجود "أمر"
                });
                $varb = $this->present($request->verb,$pronoun->id);
                if($pronoun->id == 3 ){
                    $letters = mb_str_split($varb); 
                    $letters[5] = 'ْ'; // Add socon (ُ) to the second letter
                    $varb = implode('', $letters);
                }
                if (mb_substr($request->verb, 0, 1) == 'و') {
                    $amrResult =  $varb . ($suffix ? $suffix->formula : '');
                }else{
                    $amrResult = $sawabeq->name . $varb . ($suffix ? $suffix->formula : '');
                }
            }
        
            // تحقق من النوع "ماضي"
            if (in_array('ماضي', $types)) {
                $suffix = $pronoun->suffixes->first(function ($suffix) {
                    $suffixTypes = explode(' - ', $suffix->type); // فصل الأنواع في اللواحق
                    return in_array('ماضي', $suffixTypes); // تحقق من وجود "ماضي"
                });
                $varb = $this->past($request->verb,$pronoun->id);
                $madiResult = $varb . ($suffix ? $suffix->formula : ''); // لا توجد سوابق للماضي
            }
        }
        
        
        // بناء الفعل الماضي (بدون سوابق)
        $suffix = $pronoun->suffixes->first(function ($suffix) {
            $suffixTypes = explode(' - ', $suffix->type); // فصل الأنواع في اللواحق
            return in_array('ماضي', $suffixTypes); // تحقق من وجود "ماضي"
        });
        $varb = $this->past($request->verb,$pronoun->id);
        $madiResult = $varb . ($suffix ? $suffix->formula : ''); // لا توجد سوابق للماضي
        
        $results[] = [
            'pronoun' => $pronoun->pronoun,
            'modara' => $modaraResult ?? '-',
            'amr' => $amrResult ?? '-',
            'madi' => $madiResult ?? '-',
        ];
    }

    // إعادة النتائج كاستجابة JSON
    return response()->json($results);
}

    

}