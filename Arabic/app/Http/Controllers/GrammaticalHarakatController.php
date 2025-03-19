<?php

namespace App\Http\Controllers;

use App\Models\GrammaticalHarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GrammaticalHarakatController extends Controller
{
    public function index()
    {
        // Retrieve all records
        $records = GrammaticalHarakat::all();
        
        // Return the view with records
        return view('grammatical_harakat.index', compact('records'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'haraka' => 'required|in:الضمة,الفتحة,الكسرة,السكون',
            'position' => 'required|in:رفع,نصب,جر,جزم',
            'function' => 'required|string|max:50',
            'example_sentence' => 'required|string',
        ]);
        
        // Create a new GrammaticalHarakat record
        GrammaticalHarakat::create($request->all());

        // Redirect to index page with success message
        return redirect()->route('grammatical_harakat.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function update(Request $request, GrammaticalHarakat $grammaticalHarakat)
    {
        // Log the request data for debugging
        \Log::info('Updating record:', $grammaticalHarakat->toArray());
    
        // Validate the incoming request
        $request->validate([
            'haraka' => 'required|in:الضمة,الفتحة,الكسرة,السكون',
            'position' => 'required|in:رفع,نصب,جر,جزم',
            'function' => 'required|string|max:50',
            'example_sentence' => 'required|string',
        ]);
        
        // Update the record with new data and set the 'edit_by' field
        $grammaticalHarakat->update(array_merge($request->all(), [
            'edit_by' => Auth::id(),
        ]));
    
        // Redirect to index page with success message
        return redirect()->route('grammatical_harakat.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(GrammaticalHarakat $grammaticalHarakat)
    {
        // Soft delete: mark the record as deleted by setting 'is_deleted' to 1
        $grammaticalHarakat->update([
            'is_deleted' => 1,
            'edit_by' => Auth::id(),
        ]);

        // Redirect to index page with success message
        return redirect()->route('grammatical_harakat.index')->with('success', 'تم الحذف بنجاح');
    }
}
