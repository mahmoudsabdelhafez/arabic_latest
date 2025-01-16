<?php

namespace App\Http\Controllers;

use App\Models\EmphaticArabicLetter;

class EmphaticArabicLetterController extends Controller
{
    public function index()
    {
        // Fetch all emphatic Arabic letters
        $emphatic_letters = EmphaticArabicLetter::all();

        // Pass the data to the view
        return view('emphatic_arabic_letters.index', compact('emphatic_letters'));
    }
}
