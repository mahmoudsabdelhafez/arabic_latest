<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phoneme;
use App\Models\Image;
use App\Models\PhonemeCategory;

class PhonemeController extends Controller
{
    public function index()
    {
        $phonemes = Phoneme::all(); // Fetch all phonemes

        return view('phonemes.index', compact(['phonemes']));
    }


    public function getPlacesOfArticulation()
    {
        // Fetch distinct "place_of_articulation" values
        $places = Phoneme::select(['place_of_articulation','phoneme_category_id'])->distinct()->get();
        $images = Image::with('phonemeCategory')->orderBy('id', 'asc')->get();
        // dd($places);
        $categories = PhonemeCategory::all();  // Get all phoneme categories

        // Pass the data to the view
        return view('phonemes.place-of-articulation', compact(['places','images','categories']));
    }

   
    public function showByPlace($place)
{
    // Validate the place input
    $validatedPlace = filter_var($place, FILTER_SANITIZE_STRING);

    // Fetch phonemes by place of articulation
    $letters = Phoneme::where('place_of_articulation', $validatedPlace)->get();

    // Check if any phonemes were found
    if ($letters->isEmpty()) {
        return redirect()->route('phonemes.index')->with('error', 'No phonemes found for the specified place of articulation.');
    }


    // Pass the data to the view
    return view('phonemes.show-letter-by-place', compact('letters', 'place'));


    public function showMenu()
    {
        return view('phonemes.phonemes-menu');
    }
}
}