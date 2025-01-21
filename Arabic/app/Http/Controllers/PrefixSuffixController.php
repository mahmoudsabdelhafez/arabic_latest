<?php

namespace App\Http\Controllers;

use App\Models\Prefix;
use App\Models\Suffix;
use Illuminate\Http\Request;

class PrefixSuffixController extends Controller
{
    /**
     * Display the prefixes and suffixes.
     */
    public function index()
    {
        // Retrieve all records from the prefixes and suffixes tables
        $prefixes = Prefix::all();
        $suffixes = Suffix::all();

        // Return the view with the data
        return view('prefix_suffix.index', compact('prefixes', 'suffixes'));
    }
}
