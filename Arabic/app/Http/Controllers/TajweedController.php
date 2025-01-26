<?php

namespace App\Http\Controllers;

use App\Models\Tajweed;
use App\Models\TajweedCategory;
use App\Models\TajweedRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TajweedController extends Controller
{


    public function index()
    {
        // Fetch all the records from the Tajweeds table
        $tajweeds = Tajweed::all();

        // Pass the data to the view
        return view('tajweed.index', compact('tajweeds'));
    }

    public function ayah(){
        return view('tajweed.ayah');
    }


    public function checkTajweed(Request $request)
{
    $ayah = $request->query('ayah'); // Get the Ayah text
    $matches = [];
    
    // Normalize the Ayah text
    $normalizedAyah = $this->normalizeText($ayah);
    
    // Fetch Tajweed rules from the database
    $tajweeds = DB::table('tajweeds')->get();
    
    foreach ($tajweeds as $tajweed) {
        // Normalize the expression for comparison
        $normalizedExpression = $this->normalizeText($tajweed->expression);
        
        // Check if the normalized expression exists in the normalized Ayah
        if (strpos($normalizedAyah, $normalizedExpression) !== false) {
            // Find the word that contains the matching expression
            preg_match("/\S*$normalizedExpression\S*/", $ayah, $matchesInWord);
            
            $matches[] = [
                'rule_name' => $tajweed->rule_name,
                'expression' => $tajweed->expression,
                'matching_word' => isset($matchesInWord[0]) ? $matchesInWord[0] : '', // Store the matching word
            ];
        }
    }

    if (count($matches) > 0) {
        return response()->json(['success' => true, 'matches' => $matches]);
    } else {
        return response()->json(['success' => false, 'message' => 'No Tajweed rule matches this Ayah.']);
    }
}

    
    
    /**
     * Normalize Arabic text to handle encoding issues.
     * Keeps diacritics for accurate matching.
     */
    private function normalizeText($text)
    {
        // Normalize text to NFC (Canonical Composition)
        $text = \Normalizer::normalize($text, \Normalizer::FORM_C);
    
        return $text;
    }




      // Display the form to add a Tajweed rule
     // Display the form
    public function create()
    {
        $categories = TajweedCategory::all(); // Fetch all categories from the database
        return view('tajweed.add-rule', compact('categories'));
    }

    // Store the new Tajweed rule
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'rule_name' => 'required|string|max:255',
            'description' => 'required|string',
            'example_ayah' => 'required|string',
            'expression' => 'required|string',
        ]);

        // Store the new Tajweed rule in the database
        Tajweed::create([
            'category_id' => $request->category_id,
            'rule_name' => $request->rule_name,
            'description' => $request->description,
            'example_ayah' => $request->example_ayah,
            'expression' => $request->expression,
        ]);

        return redirect()->route('add-rule')->with('success', 'Tajweed rule added successfully!');
    }


    // Edit and Update Tajweed Rule 
    public function edit($id)
{
    // Find the Tajweed rule by its ID
    $tajweed = Tajweed::findOrFail($id);
    $categories = TajweedCategory::all(); // Fetch all categories from the database

    
    // Return the view and pass the Tajweed rule to it
    return view('tajweed.edit-rule', compact('tajweed', 'categories'));
}

public function update(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'category_id' => 'required|exists:tajweed_categories,id',
        'rule_name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'example_ayah' => 'nullable|string',
        'expression' => 'nullable|string',
    ]);

    // Find the rule by ID
    $tajweed = Tajweed::findOrFail($id);

    // Update the rule with the new data
    $tajweed->update([
        'category_id' => $request->category_id,
        'rule_name' => $request->rule_name,
        'description' => $request->description,
        'example_ayah' => $request->example_ayah,
        'expression' => $request->expression,
    ]);

    // Redirect back to the Tajweed list with a success message
    return redirect()->route('tajweed.index')->with('success', 'Rule updated successfully.');
}

// Delete Tajweed Rule

public function destroy($id)
{
    // Find the Tajweed rule by ID
    $tajweed = Tajweed::findOrFail($id);

    // Delete the rule
    $tajweed->delete();

    // Redirect back to the Tajweed list with a success message
    return redirect()->route('tajweed.index')->with('success', 'Rule deleted successfully.');
}


// =======================================================

    

    // public function showRulesLetters()
    // {
    //     // Fetch Tajweed rules with their associated letters (letter1 and letter2)
    //     $rulesLetters = TajweedRule::with(['letter1', 'letter2'])->get();

    //     return view('tajweed.rules_letters', compact('rulesLetters'));
    // }

    // public function showRulesDiacritics()
    // {
    //     // Fetch Tajweed rules with their associated diacritics
    //     $rulesDiacritics = TajweedRule::with(['letter1','diacritics'])->get();
    //     // dd($rulesDiacritics);

    //     return view('tajweed.rules_diacritics', compact('rulesDiacritics'));
    // }
}
