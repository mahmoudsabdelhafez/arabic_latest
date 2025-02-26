<?php

namespace App\Http\Controllers;

use App\Models\QuranBasmala;
use App\Models\SeekingRefuge;
use Illuminate\Http\Request;

class RefugeBasmalaController extends Controller
{
    public function index()
    {
        $seekingRefuges = SeekingRefuge::all();
        $basmalas = QuranBasmala::all();

        return view('refuge-basmala.index', compact('seekingRefuges', 'basmalas'));
    }
}
