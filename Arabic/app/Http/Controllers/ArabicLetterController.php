<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ArabicLetter;

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
}
