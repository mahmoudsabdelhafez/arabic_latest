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
}
