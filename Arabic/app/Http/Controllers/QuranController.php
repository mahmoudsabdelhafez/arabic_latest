<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quran;

class QuranController extends Controller
{

    public function show()
    {
        return view('quran.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Quran::whereRaw("BINARY text LIKE ?", ["%$query%"])->paginate(20);
        return response()->json($results);
    }
}

