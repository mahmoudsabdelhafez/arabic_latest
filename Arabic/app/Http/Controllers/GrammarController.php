<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sawabeq;
use App\Models\Lawaheq;

class GrammarController extends Controller
{
    public function index()
    {
        $sawabeq = Sawabeq::all();
        $lawaheq = Lawaheq::all();

        return view('sawabeq_and_lawaheq.index', compact('sawabeq', 'lawaheq'));
    }
}
