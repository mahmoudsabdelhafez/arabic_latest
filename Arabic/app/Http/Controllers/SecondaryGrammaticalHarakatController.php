<?php

namespace App\Http\Controllers;

use App\Models\SecondaryGrammaticalHarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecondaryGrammaticalHarakatController extends Controller
{
    public function index()
    {
        // Retrieve all records where 'is_deleted' is 0
        $records = SecondaryGrammaticalHarakat::where('is_deleted', 0)->get();
        
        // Return the view with records
        return view('secondary_grammatical_harakat.index', compact('records'));
    }
    

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'haraka' => 'required|in:الواو,الألف,الياء',
            'state' => 'required|in:رفع,نصب,جر',
            'function' => 'required|string|max:100',
            'example_sentence' => 'required|string',
        ]);
        
        // Create a new SecondaryGrammaticalHarakat record
        SecondaryGrammaticalHarakat::create($request->all());

        // Redirect to index page with success message
        return redirect()->route('secondary_grammatical_harakat.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function update(Request $request, SecondaryGrammaticalHarakat $secondaryGrammaticalHarakat)
    {
        // Log the request data for debugging
        \Log::info('Updating record:', $secondaryGrammaticalHarakat->toArray());
    
        // Validate the incoming request
        $request->validate([
            'haraka' => 'required|in:الواو,الألف,الياء',
            'state' => 'required|in:رفع,نصب,جر',
            'function' => 'required|string|max:100',
            'example_sentence' => 'required|string',
        ]);
        
        // Update the record with new data and set the 'edit_by' field
        $secondaryGrammaticalHarakat->update(array_merge($request->all(), [
            'edit_by' => Auth::id(),
        ]));
    
        // Redirect to index page with success message
        return redirect()->route('secondary_grammatical_harakat.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(SecondaryGrammaticalHarakat $secondaryGrammaticalHarakat)
    {
        // Soft delete: mark the record as deleted by setting 'is_deleted' to 1
        $secondaryGrammaticalHarakat->update([
            'is_deleted' => 1,
            'edit_by' => Auth::id(),
        ]);

        // Redirect to index page with success message
        return redirect()->route('secondary_grammatical_harakat.index')->with('success', 'تم الحذف بنجاح');
    }
}
