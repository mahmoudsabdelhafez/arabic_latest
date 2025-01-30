<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\ArabicDiacritic;
use App\Models\ArabicLetter;
use Illuminate\Http\Request;
use App\Models\Phoneme;
use App\Models\Image;
use App\Models\PhonemeCategory;

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

    public function phonemesDiacritics($id)
{
    $letter = ArabicLetter::find($id);

    if (!$letter) {
        return abort(404, 'Letter not found');
    }

    // جلب جميع الحركات وإضافة العلاقة إن وجدت
    $diacritics = ArabicDiacritic::with(['arabicLetters' => function ($query) use ($id) {
        $query->where('arabic_letter_id', $id)
              ->withPivot('has_meaning', 'nots', 'is_preposition','used');
    }])->get();

    // dd($diacritics);

    return view('phonemes.phonemes_diacritics', compact('letter', 'diacritics'));
}

    
    
    public function updatePhonemeDiacritic(Request $request)
{
    // Validate the request data
    $request->validate([
        'letter_id' => 'required|exists:arabic_letters,id',
        'diacritic_id' => 'required|exists:arabic_diacritics,id',
        'used' => 'required|boolean',
        'has_meaning' => 'required|boolean',
        'nots' => 'required|string',
        'is_preposition' => 'required|boolean',
    ]);

    // Find the letter
    $letter = ArabicLetter::findOrFail($request->letter_id);

    // Check if the pivot record exists
    $pivot = $letter->arabicDiacritics()->where('arabic_diacritic_id', $request->diacritic_id)->first();

    if ($pivot) {
        // Update the existing pivot
        $letter->arabicDiacritics()->updateExistingPivot($request->diacritic_id, [
            'used' => $request->used,
            'has_meaning' => $request->has_meaning,
            'nots' => $request->nots,
            'is_preposition' => $request->is_preposition,
        ]);
    } else {
        // If pivot doesn't exist, create it
        $letter->arabicDiacritics()->attach($request->diacritic_id, [
            'used' => $request->used,
            'has_meaning' => $request->has_meaning,
            'nots' => $request->nots,
            'is_preposition' => $request->is_preposition,
        ]);
    }

    return back()->with('success', 'Updated successfully!');
}

}