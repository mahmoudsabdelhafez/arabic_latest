<?php

namespace App\Http\Controllers;

use App\Models\ArabicPhonetic;

class ArabicPhoneticController extends Controller
{
    public function index()
    {
        // Fetch all Arabic phonetic data
        $phonetics = ArabicPhonetic::all();

        // Pass the phonetic data to the view
        return view('arabic_phonetics.index', compact('phonetics'));
    }
}
