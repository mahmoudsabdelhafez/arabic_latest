<?php

namespace App\Http\Controllers;

use App\Models\BuiltInAdverb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class BuiltInAdverbController extends Controller
{
    public function index()
    {
        $records = BuiltInAdverb::where('is_deleted', 0)->get();
        return view('built_in_adverbs.index', compact('records'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'adverb_type' => 'required|in:ضم,فتح,سكون',
            'adverb' => 'required|string|max:50',
            'example_sentence' => 'required|string',
            'syntactic_analysis' => 'required|string',
            'semantic_analysis' => 'required|string',
        ]);
        
        BuiltInAdverb::create($request->all());

        return redirect()->route('built_in_adverbs.index')->with('success', 'تمت الإضافة بنجاح');
    }


    public function update(Request $request, BuiltInAdverb $builtInAdverb)
    {
        // Log request data for debugging
        \Log::info('Updating record:', $builtInAdverb->toArray());
    
        $request->validate([
            'adverb_type' => 'required|in:ضم,فتح,سكون',
            'adverb' => 'required|string|max:50',
            'example_sentence' => 'required|string',
            'syntactic_analysis' => 'required|string',
            'semantic_analysis' => 'required|string',
        ]);
        
    
        $builtInAdverb->update(array_merge($request->all(), [
            'edit_by' => Auth::id(),
        ]));
    
        return redirect()->route('built_in_adverbs.index')->with('success', 'تم التحديث بنجاح');
    }
    
    

    public function destroy(BuiltInAdverb $builtInAdverb)
    {
        $builtInAdverb->update([
            'is_deleted' => 1,
            'edit_by' => Auth::id(),
        ]);

        return redirect()->route('built_in_adverbs.index')->with('success', 'تم الحذف بنجاح');
    }
}
