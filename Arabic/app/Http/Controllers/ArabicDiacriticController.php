<?php

namespace App\Http\Controllers;

use App\Models\ArabicDiacritic;
use Illuminate\Http\Request;

class ArabicDiacriticController extends Controller
{
    public function index()
    {
        // Fetch all Arabic diacritics
        $diacritics = ArabicDiacritic::all();

        // Pass the diacritics data to the view
        return view('arabic_diacritics.index', compact('diacritics'));
    }
}
