<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\SequenceImport;
use App\Models\ArabicThreeLetterCombination;
use Doctrine\Inflector\Rules\Word;
use App\Models\Sequence;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class possiblewordscontroller extends Controller
{
    // public function findWordsWithSequences()
    // {
    //     // Get the sequences from the Excel file
    // $sequences = Sequence::pluck('sequence')->toArray();

    // // Debugging: Check the sequences
    // dd($sequences);

    // // Retrieve all words
    // $results = Word::all();

    // // Filter words that do NOT contain any of the sequences
    // $filteredResults = $results->filter(function ($word) use ($sequences) {
    //     foreach ($sequences as $sequence) {
    //         // Check if the sequence exists in the word (combination) and exclude it
    //         if (strpos($word->combination, $sequence) !== false) {
    //             return false; // Exclude word if it contains the sequence
    //         }
    //     }
    //     return true; // Keep word if it doesn't contain any of the sequences
    // });
    //     return view('possible_three_letter_words.index', compact('results'));   
    
    // }

    public function showUploadForm()
    {
        return view('possible_three_letter_words.upload');
    }

    public function uploadExcel(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:10240', // Validate file type and size
        ]);

        // Store the uploaded file
        $file = $request->file('file');

        // Import the sequences from the Excel file
        Excel::import(new SequenceImport, $file);

        return back()->with('success', 'Excel file has been successfully imported.');
    }

    public function filterWords()
    {

        $totalRowsBeforeFiltering = ArabicThreeLetterCombination::count();


        // Step 1: Retrieve the sequences from the database
        $sequences = Sequence::pluck('sequence')->toArray();
    
        // Step 2: Initialize the query builder for filtering combinations
        $query = ArabicThreeLetterCombination::query();
    
        // Step 3: Loop through each sequence and apply the LIKE condition
        foreach ($sequences as $sequence) {
            $query->orWhere('combination', 'LIKE', '%'.$sequence.'%');

        }
    
        // Step 4: Execute the query to get the filtered combinations
        $filteredCombinations = $query->get();
    
        // Step 5: Get the total number of rows in the filtered combinations
        $totalRows = $filteredCombinations->count();
    
        // Step 6: Return filtered combinations and the total row count to the view
        return view('possible_three_letter_words.index', [
            'filteredWords' => $filteredCombinations,
            'totalRows' => $totalRows,
            'totalRowsBeforeFiltering' => $totalRowsBeforeFiltering
        ]);
    }
    
    

    
    
    

}
