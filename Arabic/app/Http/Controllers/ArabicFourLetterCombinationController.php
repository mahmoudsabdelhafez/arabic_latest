<?php

namespace App\Http\Controllers;

use App\Models\ArabicLetter;
use App\Models\ArabicFourLetterCombination;
use Illuminate\Http\Request;

class ArabicFourLetterCombinationController extends Controller
{
    // Generate 3-letter combinations and store them in the database
    public function generateCombinations()
    {
        // Fetch all Arabic letters from the database
        $letters = ArabicLetter::pluck('letter')->toArray();

        // Generate all 3-letter combinations
        $combinations = [];
        foreach ($letters as $letter1) {
            foreach ($letters as $letter2) {
                foreach ($letters as $letter3) {
                    foreach ($letters as $letter4) {

                        // Create the combination and add to the array
                        $combinations[] = $letter1 . $letter2 . $letter3 . $letter4;
                    }
                }
            }
        }

        // Insert all combinations into the database
        foreach ($combinations as $combination) {
            ArabicFourLetterCombination::create(['combination' => $combination]);
        }

        // Return a message to confirm the operation
        return response()->json(['message' => '4-letter combinations have been generated and stored.']);
    }

    // Display all 3-letter combinations
    public function index()
    {
        $combinations = ArabicFourLetterCombination::limit(10000)->get();
        return view('four_letter_combinations.index', compact('combinations'));
    }
}
