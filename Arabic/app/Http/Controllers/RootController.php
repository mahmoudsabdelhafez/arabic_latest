<?php

namespace App\Http\Controllers;

use App\Imports\RootImport;
use App\Models\Root;
use App\Models\Word;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class RootController extends Controller
{
    
   public function showForm()
   {
       return view('roots.import'); // You will create this view
   }

   /**
    * Handle the import of the Excel file.
    */
   public function import(Request $request)
   {
       $request->validate([
           'file' => 'required|mimes:xlsx,csv', // Validate file type
       ]);

       // Store the file temporarily
       $filePath = $request->file('file')->store('temp');  

       // Import the file
       Excel::import(new RootImport, storage_path('app/' . $filePath));

       // Redirect back with success message
       return back()->with('success', 'Data imported successfully!');   
   }


   public function index()
   {
       // Get all roots from the database
       $roots = Root::all();

       // Pass roots data to the view
       return view('roots.index', compact('roots'));
   }


   public function indexWords()
{
    // Fetch all words with their corresponding root using eager loading
    $words = Word::with('root')->limit(100)->get();

    return view('words.index', compact('words'));
}
}
