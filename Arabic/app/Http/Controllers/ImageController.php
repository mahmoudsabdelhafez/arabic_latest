<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\PhonemeCategory;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        // عرض جميع الصور
        $images = Image::orderBy('id', 'asc')->get();
        $phonemeCategories = PhonemeCategory::all(); // استرجاع جميع الفئات
        return view('picture_phonetic.index', compact('phonemeCategories', 'images'));
    }

    public function upload(){
       
    $phonemeCategories = PhonemeCategory::all(); // استرجاع جميع الفئات
    $images = Image::all(); // استرجاع جميع الصور
    return view('picture_phonetic.upload', compact('phonemeCategories', 'images'));
}
    public function store(Request $request)
    {
        // التحقق من المدخلات
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phoneme_category_id'=> 'required'
        ]);

        // رفع الصورة
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        // حفظ مسار الصورة في قاعدة البيانات
        Image::create([
            'name' => $imageName,
            'path' => 'images/' . $imageName,
            'phoneme_category_id' => $request->phoneme_category_id,
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }
}
