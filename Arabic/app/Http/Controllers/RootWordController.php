<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\RootWord;
use App\Imports\RootWordsImport;
use App\Models\Prefix;
use App\Models\Prefixe;
use App\Models\Suffix;
use Illuminate\Support\Facades\DB;

class RootWordController extends Controller
{
     /**
     * Import the Excel file
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        DB::table('root_words')->truncate();
        DB::statement('ALTER TABLE root_words AUTO_INCREMENT = 1');
        


        // Store the file manually (in storage/app/uploads or a custom location)
        $filePath = $request->file('file')->storeAs('uploads', 'yourfilename.xlsx');  // Change filename as needed

        // Import the Excel file
        Excel::import(new RootWordsImport, storage_path('app/' . $filePath));

        return redirect()->route('root-words.index')->with('success', 'Excel file imported successfully!');
    }

    /**
     * Display the list of root words
     */
    public function index()
    {
        $rootWords = RootWord::all();
        return view('rootWords.index', compact('rootWords'));
    }


    public function index2()
    {
        // Fetch the root words with prefixes and suffixes
        $rootWordsData = RootWord::with(['prefixes', 'suffixes'])->take(10)->get();

        // Prepare the data for rendering
        $rootWordsWithDetails = $rootWordsData->map(function ($rootWord) {
            $prefixes = $rootWord->prefixes->map(function ($prefix) use ($rootWord) {
                // Check if the prefix can concatenate or must be separate
                if ($prefix->can_concatenate) {
                    return $prefix->formula . $rootWord->root;  // Concatenate prefix with root
                } else {
                    return $prefix->formula . ' ' . $rootWord->root;  // Separate prefix with a dot
                }
            });

            $suffixes = $rootWord->suffixes->map(function ($suffix) use ($rootWord) {
                return $rootWord->root . $suffix->name;  // Concatenate suffix to root
            });

            return [
                'root' => $rootWord->root,
                'prefixes' => $prefixes,
                'suffixes' => $suffixes
            ];
        });

        // Pass the data to the view
        return view('rootWords.index2', compact('rootWordsWithDetails'));
    }
    


    public function attachPrefixesAndSuffixes(Request $request)
    {
        // Get all the root words
        $rootWords = RootWord::all();

        // Loop through each root word
        foreach ($rootWords as $rootWord) {
            // Get all the prefixes and suffixes (or choose specific ones based on your logic)
            $prefixes = Prefixe::all();
            $suffixes = Suffix::all();

            // Attach prefixes to the root word
            foreach ($prefixes as $prefix) {
                $rootWord->prefixes()->attach($prefix->id); // Attach each prefix
            }

            // Attach suffixes to the root word
            foreach ($suffixes as $suffix) {
                $rootWord->suffixes()->attach($suffix->id); // Attach each suffix
            }
        }

        // Redirect back with a success message
        return redirect()->route('root-words.index')->with('success', 'Prefixes and Suffixes attached to all root words successfully!');
    }

    public function info(){
        phpinfo();

    }


   



}
