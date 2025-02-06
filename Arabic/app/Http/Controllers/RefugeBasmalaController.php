<?php

namespace App\Http\Controllers;

use App\Models\Basmala;
use App\Models\SeekingRefuge;
use Illuminate\Http\Request;

class RefugeBasmalaController extends Controller
{
    public function index()
    {
        $seekingRefuges = SeekingRefuge::all();
        $basmalas = Basmala::all();

        return view('refuge-basmala.index', compact('seekingRefuges', 'basmalas'));
    }
}
