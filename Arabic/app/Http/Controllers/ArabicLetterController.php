<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ArabicLetter;
use App\Models\ArabicTool;

class ArabicLetterController extends Controller
{
    
    public function index()
    {
        $letters = ArabicLetter::all();
        return view('arabic_letters.index', compact('letters'));
    }
    public function ini()
    {
        
        phpinfo();

    }

    public function store(Request $request)
    {
        
        // Attaching to the pivot table with additional data, including diacritic_id
        // $tool->arabicLetters()->attach($letter->id, [
        //     'arabic_diacritic_id' => $diacritic->id,
        //     'usage_meaning' => 'Used for diacritic marking',
        //     'effect' => 'Affects vowel sound',
        //     'example' => 'Example sentence with diacritic'
        // ]);
        // dd($request);
        // التحقق من البيانات المدخلة
        $request->validate([
            'tool_id' => 'required|exists:arabic_tools,id',
            'letter_id' => 'required|exists:arabic_letters,id',
            'effect' => 'required',
            'note' => 'nullable|string|max:500',
        ]);

        // جلب الأداة المطلوبة
        $tool = ArabicTool::findOrFail($request->tool_id);

        // ربط الحرف بالأداة عبر الجدول الوسيط مع إدراج التأثير والملاحظة
        $tool->arabicLetters()->attach($request->letter_id, [
            'effect' => $request->effect,
            'usage_meaning' => $request->note,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return back()->with('success', 'تمت إضافة الأداة والحرف بنجاح مع التأثير والملاحظة.');

    }
}