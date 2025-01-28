<?php

namespace App\Http\Controllers;

use App\Models\PhonemeCategory;
use Illuminate\Http\Request;

class PhonemeCategoryController extends Controller
{
    public function create()
    {
        return view('phonemes.phonemes_category');  // Return the view to show the form
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create the new phoneme category
        PhonemeCategory::create($request->all());

        return redirect()->route('phonemecategories.index');  // Redirect to the index page (or wherever you want)
    }

    public function index()
    {
        $categories = PhonemeCategory::all();  // Get all phoneme categories
        return view('phonemes.phonemes_category', compact('categories'));  // Return the view to show the form
    }
}
