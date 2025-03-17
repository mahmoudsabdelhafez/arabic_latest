<?php

namespace App\Http\Controllers;

use App\Imports\RootImport;
use App\Models\Connective;
use App\Models\PhonemeActivity;
use App\Models\Prefix;
use App\Models\Prefixe;
use App\Models\Root;
use App\Models\RootType;
use App\Models\Suffix;
use App\Models\Verb;
use App\Models\VerbConjugation;
use App\Models\VerbPhonemePosition;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
       // Get paginated roots from the database (e.g., 10 per page)
       $roots = Root::paginate(10);
       $suffixes = Suffix::all(); // Suffixes might not need pagination if you want all of them
       $prefixes = Prefixe::all(); // Suffixes might not need pagination if you want all of them
       $connectives = Connective::where('connective_form', '=' ,'connected')->get();
    //    dd($connectives);
       return view('roots.index', compact(['roots', 'suffixes','prefixes','connectives']));
   }
   


   public function indexWords()
{
    // Fetch all words with their corresponding root using eager loading
    $words = Word::with('root')->limit(100)->get();

    return view('words.index', compact('words'));
}
public function treeIndex()
    {
        // Fetch the root word type (الكلمة)
        $roots = RootType::whereNull('parent_id')->get();
        // dd($roots);
        $root = $roots[0];
        return view('roots.tree', compact('root'));
    }
public function getBranchData($parentId)
    {
        // Fetch the data for the clicked branch
        $rootIds = RootType::whereNull('parent_id')->pluck('id')->toArray();

        if ($parentId == $rootIds[0]) {
            $branches = RootType::where('parent_id', $parentId)->get();
        } else {
            $branches = RootType::where('id', $parentId)->get();
            // dd($branches);
            $branches = DB::table($branches[0]->table_name)->get();
        }
        
        return response()->json($branches);
    }

    public function verbDetails($id){
        $verb = Verb::find( $id );
        dd($verb);
    }
    
    public function create()
    {
        return view('roots.angmented_root');
    }

    public function store(Request $request)
    {
        $request->validate([
            'root' => 'required|string|max:255',
            'type_id' => 'nullable|integer',
            'sensual_moral_type_id' => 'nullable|integer',
            'example' => 'nullable|string',
            'notes' => 'nullable|string',
            'conjugation_pattern' => 'required|string',
            'tense' => 'required|string',
            'voice' => 'required|string',
            'phoneme_name' => 'required|string',
            'phoneme_description' => 'nullable|string',
            'position' => 'required|integer',
            'word' => 'required|string',
            'unvowelword' => 'nullable|string',
            'nonormstem' => 'nullable|string',
        ]);

        // Insert into `roots` table
        $root = Root::create([
            'root' => $request->root,
            'type_id' => $request->type_id,
            'sensual_moral_type_id' => $request->sensual_moral_type_id,
            'example' => $request->example,
            'notes' => $request->notes,
        ]);

        // Insert into `verb_conjugations` table
        $verbConjugation = VerbConjugation::create([
            'root_id' => $root->id,
            'conjugation_pattern' => $request->conjugation_pattern,
            'tense' => $request->tense,
            'voice' => $request->voice,
        ]);

        // Insert into `phoneme_activities` table
        $phonemeActivity = PhonemeActivity::create([
            'name' => $request->phoneme_name,
            'description' => $request->phoneme_description,
        ]);

        // Insert into `verb_phoneme_positions` table
        VerbPhonemePosition::create([
            'verb_conjugation_id' => $verbConjugation->id,
            'phoneme_activity_id' => $phonemeActivity->id,
            'position' => $request->position,
        ]);

        // Insert into `words` table
        Word::create([
            'root_id' => $root->id,
            'word' => $request->word,
            'unvowelword' => $request->unvowelword,
            'nonormstem' => $request->nonormstem,
        ]);

        return redirect()->back()->with('success', 'Data stored successfully!');
    }

}