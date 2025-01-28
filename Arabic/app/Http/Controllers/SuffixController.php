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