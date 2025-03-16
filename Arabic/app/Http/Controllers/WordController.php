<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordController extends Controller
{
    private $patterns = [
        '/^[\x{0621}-\x{064A}]{3}$/u' => 'فَعَلَ', // Any 3-letter Arabic word
        '/^([\x{0621}-\x{064A}])َ([\x{0621}-\x{064A}])َ([\x{0621}-\x{064A}])$/u' => 'فَعَلَ',  // Example: "دَرَسَ"
        '/^([\x{0621}-\x{064A}])َ([\x{0621}-\x{064A}])ِ([\x{0621}-\x{064A}])$/u' => 'فَعِلَ',  // Example: "فَهِمَ"
        '/^([\x{0621}-\x{064A}])َ([\x{0621}-\x{064A}])ُ([\x{0621}-\x{064A}])$/u' => 'فَعُلَ',  // Example: "كَرُمَ"
        '/^([\x{0621}-\x{064A}])َ([\x{0621}-\x{064A}])َّ([\x{0621}-\x{064A}])$/u'    => 'فَعَّلَ', // Example: "حَطَّمَ"
        '/^(ا)(ن)([\x{0621}-\x{064A}])([\x{0621}-\x{064A}])([\x{0621}-\x{064A}])$/u'  => 'انفعل',  // Example: "انطلق"
        '/^(ا)([\x{0621}-\x{064A}])(ت)([\x{0621}-\x{064A}])([\x{0621}-\x{064A}])$/u' => 'افتعل', // Example: "افتتح"
        '/^(ا)(س)(ت)([\x{0621}-\x{064A}])([\x{0621}-\x{064A}])([\x{0621}-\x{064A}])$/u' => 'استفعل', // Example: "استخرج"
        '/^(تَ)([\x{0621}-\x{064A}])([\x{0621}-\x{064A}])َّ([\x{0621}-\x{064A}])$/u' => 'تَفَعَّلَ', // Example: "تكلّم"
        '/^(تَ)([\x{0621}-\x{064A}])(ا)([\x{0621}-\x{064A}])([\x{0621}-\x{064A}])$/u' => 'تفاعل', // Example: "تعاون"
        '/^([\x{0621}-\x{064A}])(ا)([\x{0621}-\x{064A}]ِ)([\x{0621}-\x{064A}])$/u' => 'فاعل', // Example: "تعاون"
        '/^(أَ)([\x{0621}-\x{064A}])([\x{0621}-\x{064A}])([\x{0621}-\x{064A}])$/u' => 'أفعل', // Example: "أكرم"
        '/^([\x{0621}-\x{064A}])([\x{0621}-\x{064A}])([\x{0621}-\x{064A}])(ا)$/u' => 'فعلا', // Example: "كبرى"
    ];

    public function analyze(Request $request)
    {
        $request->validate([
            'verb' => 'required|string'
        ]);

        $verb = $request->input('verb');
        $result = 'Unknown Pattern';

        foreach ($this->patterns as $pattern => $form) {
            if (preg_match($pattern, $verb)) {
                $result = $form;
                break;
            }                
        }
        
        // Fixed: Removed the dd() function that was breaking the JSON response
        
        if ($request->ajax()) {
            return response()->json([
                'verb' => $verb,
                'pattern' => $result
            ]);
        }
        
        return view('words.show', [
            'verb' => $verb,
            'pattern' => $result,
            'result' => true
        ]);
    }
    
    public function derive(Request $request)
    {
        $request->validate([
            'root' => 'required|string'
        ]);
        
        $root = $request->input('root');
        $letters = preg_split('//u', $root, -1, PREG_SPLIT_NO_EMPTY);
        [$fa, $ain, $lam] = $letters;
        $derivedForms = $this->deriveForms($root);
        // dd($derivedForms);
        if ($request->ajax()) {
            return response()->json([
                'root' => $root,
                'fa'=> $fa,
                'ain'=> $ain,
                'lam'=> $lam,
                'derivedForms' => $derivedForms
            ]);
        }
       
        
        return view('words.show', [
            'root' => $root,
            'fa'=> $fa,
            'ain'=> $ain,
            'lam'=> $lam,
            'derivedForms' => $derivedForms
        ]);
    }
    
    public function index()
    {
        // Show the main page
        return view('words.show');
    }

    /**
     * Generate modified forms of an Arabic verb.
     *
     * @param string $verb
     * @return array
     */
public function deriveForms(string $verb): array
{
    $verb = trim($verb); // Get the input verb
    $letters = preg_split('//u', $verb, -1, PREG_SPLIT_NO_EMPTY);

    // if (count($letters) !== 3) {
    //     return response()->json(['error' => 'The verb should be trilateral (3 root letters)']);
    // }

    [$fa, $ain, $lam] = $letters; // Extract root letters

    $patterns = [
        "المصدر الصريح"   => "فِعَالَة: " . $this->applyPattern($fa, $ain, $lam, 'ِ', 'ا', 'ة'),
        "المصدر الميمي"    => "مَفْعَل: مَ$fa$ain$lam",
        "المصدر الصناعي"   => "مَفْعَلِيَّة: م" . $this->applyPattern($fa, $ain, $lam, 'َ', '', 'يّة'),
        "اسم الفاعل"       => "فَاعِل: " . $this->applyPattern($fa, $ain, $lam, 'ا', '', 'ِ'),
        "اسم المفعول"      => "مَفْعُول: مَ" . $this->applyPattern($fa, $ain, $lam, 'ْ', 'و', 'ُ'),
        "اسم الزمان"       => "مَفْعِل: مَ" . $this->applyPattern($fa, $ain, $lam, 'ْ', 'ِ', ''),
        "اسم المكان"       => "مَفْعَل: مَ" . $this->applyPattern($fa, $ain, $lam, 'ْ', 'َ', ''),
        "اسم الآلة"        => "مِفْعَل: مِ" . $this->applyPattern($fa, $ain, $lam, 'ْ', 'َ', ''),
        "اسم الهيئة"       => "فِعْلَة: " . $this->applyPattern($fa, $ain, $lam, 'ِ', '', 'ة'),
        "اسم المَرَّةِ"   => "فَعْلَة: " . $this->applyPattern($fa, $ain, $lam, 'ْ', '', 'ة'),
        "اسم التفضيل"      => "أَفْعَل: أَ" . $this->applyPattern($fa, $ain, $lam, 'ْ', '', ''),
        "الحال"            => "فَاعِلًا: " . $this->applyPattern($fa, $ain, $lam, 'ا', '', 'ًا'),
        "التمييز"          => "تمييز: " . $this->applyPattern($fa, $ain, $lam, '', '', 'ًا'),

        // صرفي أوزان الأفعال
        // "فعل"   => "$fa$ain$lam",
        // "فَعَّلَ"  => "$fa" . "َ" .  "$ain"."ّ" . "َ" . "$lam",
        // "فَاعَلَ"  => "$fa" . "ا" . "$ain" . "َ" . "$lam",
        // "أَفْعَلَ" => "أَ" . "$fa" . "ْ" . "$ain" . "َ" . "$lam",
        // "تَفَعَّلَ" => "تَ" . "$fa" . "َ" . "$ain"."ّ" . "َ" . "$lam",
        // "تَفاعَلَ" => "تَ" . "$fa" . "ا" . "$ain" . "َ" . "$lam",
        // "اِنْفَعَلَ" => "اِنْ" . "$fa" . "َ" . "$ain" . "َ" . "$lam",
        // "اِفْتَعَلَ" => "اِ" . "$fa" . "ْتَ" . "$ain" . "َ" . "$lam",
        // "اِسْتَفْعَلَ" => "اِسْتَ" . "$fa" . "ْ" . "$ain" . "َ" . "$lam",
    ];

    // Process derived forms to extract additional letters
    $derivedForms = [];
    foreach ($patterns as $title => $form) {
        $extraLetters = str_replace([$fa, $ain, $lam], '', $form);
        $derivedForms[$title] = [
            'result' => $form,
            'extraLetters' => $extraLetters
        ];
    };

    return $derivedForms;
}

/**
 * Helper function to apply vowelization patterns.
 */
private function applyPattern($fa, $ain, $lam, $fa_vowel, $ain_vowel, $lam_vowel)
{
    return $fa . $fa_vowel . $ain . $ain_vowel . $lam . $lam_vowel;
}

}