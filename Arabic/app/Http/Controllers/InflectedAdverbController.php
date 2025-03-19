<?php

namespace App\Http\Controllers;

use App\Models\InflectedAdverb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InflectedAdverbController extends Controller
{
    public function index()
    {
        // Retrieve records where 'is_deleted' is 0 (assuming you want to implement soft deletes)
        $records = InflectedAdverb::where('is_deleted', 0)->get();
        
        // Return the view with records
        return view('inflected_adverbs.index', compact('records'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'adverb_type' => 'required|in:مبهمة,مختصة',
            'adverb' => 'required|string|max:50',
            'example_sentence' => 'required|string',
            'syntactic_analysis' => 'required|string',
            'semantic_analysis' => 'required|string',
        ]);
        
        // Create a new InflectedAdverb record
        InflectedAdverb::create($request->all());

        // Redirect to index page with success message
        return redirect()->route('inflected_adverbs.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function update(Request $request, InflectedAdverb $inflectedAdverb)
    {
        // Log the request data for debugging
        \Log::info('Updating record:', $inflectedAdverb->toArray());
    
        // Validate the incoming request
        $request->validate([
            'adverb_type' => 'required|in:مبهمة,مختصة',
            'adverb' => 'required|string|max:50',
            'example_sentence' => 'required|string',
            'syntactic_analysis' => 'required|string',
            'semantic_analysis' => 'required|string',
        ]);
        
        // Update the record with new data and set the 'edit_by' field
        $inflectedAdverb->update(array_merge($request->all(), [
            'edit_by' => Auth::id(),
        ]));
    
        // Redirect to index page with success message
        return redirect()->route('inflected_adverbs.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(InflectedAdverb $inflectedAdverb)
    {
        // Soft delete: mark the record as deleted by setting 'is_deleted' to 1
        $inflectedAdverb->update([
            'is_deleted' => 1,
            'edit_by' => Auth::id(),
        ]);

        // Redirect to index page with success message
        return redirect()->route('inflected_adverbs.index')->with('success', 'تم الحذف بنجاح');
    }
}
