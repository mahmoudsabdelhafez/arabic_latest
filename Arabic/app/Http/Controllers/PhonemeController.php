<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

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

        // Pass phonemes to the view
        return view('phonemes.index', compact('phonemes'));
    }

    public function getPlacesOfArticulation()
    {
        // Fetch distinct "place_of_articulation" values along with phoneme_category_id
        $places = Phoneme::select(['place_of_articulation', 'phoneme_category_id'])->distinct()->get();
        
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
    
}