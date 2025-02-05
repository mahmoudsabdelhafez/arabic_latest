<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\ArabicDiacritic;
use App\Models\ArabicLetter;
use App\Models\ArabicTool;
use App\Models\Conditional;
use App\Models\Detail;
use App\Models\Exception as ModelsException;
use App\Models\Explanation;
use Illuminate\Http\Request;
use App\Models\Phoneme;
use App\Models\Image;
use App\Models\Negative;
use App\Models\PhonemeCategory;
use App\Models\Preposition;
use App\Models\Sawabeq;
use App\Models\Tool;
use Exception;
use Illuminate\Support\Facades\DB;

class PhonemeController extends Controller
{
    public function index()
    {
        // Fetch all phonemes
        $phonemes = Phoneme::all();
        // dd($phonemes[0]->arabicLetter);
        // Pass phonemes to the view
        return view('phonemes.index', compact('phonemes'));
    }

    public function getPlacesOfArticulation()
    {
        // Fetch distinct "place_of_articulation" values along with phoneme_category_id
        $places = Phoneme::select(['place_of_articulation', 'phoneme_category_id','articulation_arabic_name'])->distinct()->get();
        
        // Fetch images with related phoneme categories
        $images = Image::with('phonemeCategory')->orderBy('id', 'asc')->get();
        
        // Fetch all phoneme categories
        $categories = PhonemeCategory::all();

        // Pass the data to the view
        return view('phonemes.place-of-articulation', compact('places', 'images', 'categories'));
    }

    public function showByPlace($place)
    {
        // تنظيف المدخلات
        $validatedPlace = filter_var($place, FILTER_SANITIZE_STRING);
    
        // جلب البيانات مع العلاقة
        $letters = Phoneme::with('arabicLetter')
                          ->where('place_of_articulation', $validatedPlace)
                          ->get();
    
        if ($letters->isEmpty()) {
            return response()->json(['error' => 'No phonemes found for the specified place of articulation.'], 404);
        }
    
        return response()->json($letters);
    }
    
    public function showMenu()
    {
        return view('phonemes.phonemes-menu');
    }

    public function details(Phoneme $phoneme)
    {
        $tools = Tool::all();
        // $letter = ArabicTool::with('arabicLetters')->findOrFail(2);
        $letter = ArabicLetter::with('arabicTools')->find($phoneme->id);

        $rule = $this->search($letter->letter);

        // dd($letter->arabicTools); // عرض الأدوات المرتبطة

        // dd($rule);
        return view('phonemes.phoneme_details', compact(['phoneme','tools','letter','rule']));
    }

    public function phonemesDiacritics($id)
{
    $letter = ArabicLetter::find($id);

    if (!$letter) {
        return abort(404, 'Letter not found');
    }

    $rule = $this->search($letter->letter);

    // dd($rule);
    // $tools = ArabicTool::all();
    $tools = Tool::all();
        // dd($tools);
    // جلب جميع الحركات وإضافة العلاقة إن وجدت
    $diacritics = ArabicDiacritic::with(['arabicLetters' => function ($query) use ($id) {
        $query->where('arabic_letter_id', $id)
              ->withPivot('usage_meaning', 'effect', 'example');
    }])->get();
   

<<<<<<< HEAD
    return view('phonemes.phonemes_diacritics', compact('letter', 'diacritics','tools','rule'));
=======

    return view('phonemes.phonemes_diacritics', compact('letter', 'diacritics','tools'));
>>>>>>> 6e3babc8d3040dba592d9b9ad785c91807e6861d
}

    
    
public function updatePhonemeDiacritic(Request $request)


public function showMenu()

{
    // Validate the request data
    
        $request->validate([
            'arabic_tool_id' => 'required|integer',
            'english_name' => 'required|string|max:255',
            'arabic_letter_id' => 'required',
            'arabic_diacritic_id' => 'nullable',
            'semantic_function' => 'required|string|max:255',
            'grammatical_function' => 'required|string|max:255',
            'example' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $table = Tool::findOrFail($request->arabic_tool_id);
        $table = strtolower($table->name).'s';
        DB::table($table)->insert([
            'tool_id' => $request->arabic_tool_id,
            'english_name' => $request->english_name,
            'name' => $request->arabic_letter_id . $request->arabic_diacritic_id,
            'semantic_function' => $request->semantic_function,
            'grammatical_function' => $request->grammatical_function,
            'example' => $request->example,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح!');
    
}



public function checkStore(Request $request)
    {
        $word = $request->input('word');
        $Letters = mb_str_split($word);
        // $firstLetter = mb_substr($word, 2, 2); // استخراج أول حرف من الكلمة
        if(count($Letters)>=4) {
            $firstLetter = $Letters[0];
        $pre = null;
        // البحث عن الحرف في جدول ArabicLetter
        $arabicLetter = ArabicLetter::where('letter', $firstLetter)->first();
        $prefix = Sawabeq::where('name',$firstLetter)->get();
        if(isset($prefix)){
            $pre=$prefix;
        }
        if ($arabicLetter) {
            // إذا كان الحرف موجودًا في جدول ArabicLetter، نبحث عن الأداة المرتبطة به
            $tool = $arabicLetter->arabicTools->first(); // أخذ أول أداة مرتبطة بهذا الحرف

            // التحقق إذا كان الحرف مرتبطًا بجدول arabicDiacritics
            $diacriticNote = $arabicLetter->arabicDiacritics;
            // dd($diacriticNote);
            if (isset($diacriticNote[0])) {
                if($diacriticNote[0]->diacritic == $Letters[1]){
                // إذا كانت هناك ملاحظة، نعرضها
                $note = $diacriticNote[0]->pivot->nots;
                }else{
                    $note = null;
                }
            } else {
                $note = null;
            }

            
            // dd($tool);
            if ($tool) {
                // إذا كانت هناك أداة مرتبطة بالحرف
                return view('phonemes.check_letter', compact('tool', 'firstLetter', 'note','pre'));
            } else {
                // إذا لم تكن هناك أداة مرتبطة بالحرف
                return view('phonemes.check_letter', ['error' => 'لا توجد أداة مرتبطة بهذا الحرف.', 'note' => $note,'pre' => $pre ]);
            }
        } else {
            // إذا لم يكن هناك حرف مطابق في جدول ArabicLetter
            return view('phonemes.check_letter', ['error' => 'لا يوجد حرف مطابق.', 'note' => null ,'pre' => $pre  ]);
        }
    }else{
        return view('phonemes.check_letter', ['error' => 'لا توجد أحرف زيادة', 'note' => null ,'pre' => null  ]);

    }
    
    }
public function check()
    {
            return view('phonemes.check_letter');
      
   }

   public function search($query)
    {

        // Search in multiple tables using raw queries
        $results = [
            'table1' => Conditional::where('name', 'LIKE', "$query")->get(),
            'table2' => Detail::where('name', 'LIKE', "$query")->get(),
            'table3' => Negative::where('name', 'LIKE', "$query")->get(),
            'table4' => ModelsException::where('name', 'LIKE', "$query")->get(),
            'table5' => Explanation::where('name', 'LIKE', "$query")->get(),
            'table6' => Preposition::where('name', 'LIKE', "$query")->get(),
        ];

        return response()->json($results);
    }
}