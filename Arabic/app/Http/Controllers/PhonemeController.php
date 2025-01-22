<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phoneme;


class PhonemeController extends Controller
{
    public function index()
    {
        $phonemes = Phoneme::all(); // Fetch all phonemes

        return view('phonemes.index', compact('phonemes'));
    }


    public function getPlacesOfArticulation()
    {
        // Fetch distinct "place_of_articulation" values
        $places = Phoneme::select('place_of_articulation')->distinct()->get();

        // Pass the data to the view
        return view('phonemes.place-of-articulation', compact('places'));
    }

    public function showByPlace($place)
    {
        $letters = Phoneme::where('place_of_articulation', $place)->get();
        return view('phonemes.show-letter-by-place', compact('letters', 'place'));
    }
}
