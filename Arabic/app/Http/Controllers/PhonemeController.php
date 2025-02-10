<?php

namespace App\Http\Controllers;

use App\Models\ArabicDiacritic;
use App\Models\ArabicLetter;
use App\Models\ArabicTool;
use App\Models\Classification;
use App\Models\Conditional;
use App\Models\Detail;
use App\Models\Exception as ModelsException;
use App\Models\Explanation;
use Illuminate\Http\Request;
use App\Models\Phoneme;
use App\Models\Image;
use App\Models\Linking_tool;
use App\Models\Negative;
use App\Models\PhonemeCategory;
use App\Models\Preposition;
use App\Models\Sawabeq;
use App\Models\SemanticLogicalEffect;
use App\Models\Synchronization;
use App\Models\SyntacticEffect;
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
        $tools = Linking_tool::all();
        // $letter = ArabicTool::with('arabicLetters')->findOrFail(2);
        $letter = ArabicLetter::with('arabicTools')->find($phoneme->id);

        $tables = $this->search($letter->letter);
        $syntactic_effect = SyntacticEffect::all();
        $Semantic_logical_effect = SemanticLogicalEffect::all();

        // dd($letter->arabicTools); // عرض الأدوات المرتبطة

        // dd($rule);
        return view('phonemes.phoneme_details', compact(['phoneme','tools','letter','tables','syntactic_effect','Semantic_logical_effect']));
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
    $tools = Linking_tool::all();

    $syntactic_effect = SyntacticEffect::all();
    $Semantic_logical_effect = SemanticLogicalEffect::all();

        // dd($tools);
    // جلب جميع الحركات وإضافة العلاقة إن وجدت
    $diacritics = ArabicDiacritic::with(['arabicLetters' => function ($query) use ($id) {
        $query->where('arabic_letter_id', $id)
              ->withPivot('usage_meaning', 'effect', 'example');
    }])->get();
   

    return view('phonemes.phonemes_diacritics', compact('letter', 'diacritics','tools','rule','syntactic_effect','Semantic_logical_effect'));
}

    
    
public function updatePhonemeDiacritic(Request $request)
{
    // Validate the request data
    
        $request->validate([
            'arabic_tool_id' => 'required|integer',
            'english_name' => 'required|string|max:255',
            'arabic_letter_id' => 'required',
            'arabic_diacritic_id' => 'nullable',
            'semantic_logical_effects' => 'required',
            'syntactic_effects' => 'required',
            'example' => 'required|string',
            'description' => 'nullable|string',
        ]);

    
        try {
            $table = Linking_tool::findOrFail($request->arabic_tool_id);
        $table = strtolower($table->name).'s';
        $updatedPhoneme = DB::table($table)->insert([
            'linking_tool_id' => $request->arabic_tool_id,
            'english_name' => $request->english_name,
            'name' => $request->arabic_letter_id . $request->arabic_diacritic_id,
            'semantic_logical_effects' => $request->semantic_logical_effects,
            'syntactic_effects' => $request->syntactic_effects,
            'example' => $request->example,
            'description' => $request->description,
        ]);

        if(isset($request->arabic_diacritic_id)){
            return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح!');
        }
            return response()->json([
                'message' => 'تم التحديث بنجاح',
                'data' => $updatedPhoneme
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'حدث خطأ أثناء التحديث: ' . $e->getMessage()
            ], 500);
        }
       

        // return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح!');
    
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

    if (!$query) {
        return redirect()->back()->with('error', 'Please enter a search term.');
    }

    $tables = [
        'Conditionals' => Conditional::where('name', 'LIKE', "$query")
                                       ->orWhere('name', 'LIKE', "$query%ِ")
                                       ->orWhere('name', 'LIKE', "$query%َ")
                                       ->orWhere('name', 'LIKE', "$query%ُ")->get(),

        'Details' => Detail::where('name', 'LIKE', "$query")
                             ->orWhere('name', 'LIKE', "$query%ِ")
                             ->orWhere('name', 'LIKE', "$query%َ")
                             ->orWhere('name', 'LIKE', "$query%ُ")->get(),

        'Negatives' => Negative::where('name', 'LIKE', "$query")
                                 ->orWhere('name', 'LIKE', "$query%ِ")
                                 ->orWhere('name', 'LIKE', "$query%َ")
                                 ->orWhere('name', 'LIKE', "$query%ُ")->get(),

        'Model Exceptions' => ModelsException::where('name', 'LIKE', "$query")
                                               ->orWhere('name', 'LIKE', "$query%ِ")
                                               ->orWhere('name', 'LIKE', "$query%َ")
                                               ->orWhere('name', 'LIKE', "$query%ُ")->get(),

        'Explanations' => Explanation::where('name', 'LIKE', "$query")
                                       ->orWhere('name', 'LIKE', "$query%ِ")
                                       ->orWhere('name', 'LIKE', "$query%َ")
                                       ->orWhere('name', 'LIKE', "$query%ُ")->get(),

        'Prepositions' => Preposition::where('name', 'LIKE', "$query")
                                       ->orWhere('name', 'LIKE', "$query%ِ")
                                       ->orWhere('name', 'LIKE', "$query%َ")
                                       ->orWhere('name', 'LIKE', "$query%ُ")->get(),
                                       
        'Synchronization' => Synchronization::where('name', 'LIKE', "$query")
                                       ->orWhere('name', 'LIKE', "$query%ِ")
                                       ->orWhere('name', 'LIKE', "$query%َ")
                                       ->orWhere('name', 'LIKE', "$query%ُ")->get(),
    ];
    return $tables;

}

public function ruleDetails(Request $request)
    {
    
    $letter = $request->input('letter'); // Get the letter from the query parameters
    $linking_tool_id = $request->input('linking_tool_id'); // Get the linking_tool_id from the query parameters
    $linkingTool = Linking_tool::findOrFail($linking_tool_id);
    $toolName = $request->tool_id;
    // Retrieve the data from the database
    $rules = Classification::with('linkingTool')->where('subtool_name', $letter)
                           ->where('linking_tool_id', $linking_tool_id)
                           ->get();  
// dd($rules);
        return view('phonemes.rule_details', compact(['letter','rules','linkingTool','toolName']));
    }


    public function destroy($id, $linking_tool_id)
{
    $table = Linking_tool::findOrFail($linking_tool_id);
    $table = strtolower($table->name).'s';
    $deleted = DB::table($table)
                 ->where('id', $id)
                 ->where('linking_tool_id', $linking_tool_id)
                 ->delete();

    if ($deleted) {
        return redirect()->back()->with('success', 'تم حذف القاعدة بنجاح!');
    } else {
        return redirect()->back()->with('error', 'فشل الحذف! العنصر غير موجود.');
    }
}


}