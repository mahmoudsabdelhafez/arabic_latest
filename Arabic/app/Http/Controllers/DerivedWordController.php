<?php

namespace App\Http\Controllers;

use App\Models\DerivedWord;
use App\Models\VerbConjugation; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DerivedWordController extends Controller
{
    public function index()
    {
        // Only show non-deleted records
        $records = DerivedWord::with('verbConjugation')->where('is_deleted', 0)->get();
        // dd($records);
        $roots = VerbConjugation::all();  // Get all roots for dropdown
        return view('derived_words.index', compact('records', 'roots'));
    }

    public function create()
    {
        $roots = VerbConjugation::all();  // Get all roots for dropdown
        return view('derived_words.create', compact('roots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:50',
            'pattern' => 'required|string|max:50',
            'example' => 'required|string|max:50',
            'root_id' => 'required|exists:verb_conjugations,id',
        ]);

        // Store the new record
        DerivedWord::create($request->all());

        return redirect()->route('derived_words.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(DerivedWord $derivedWord)
    {
        $roots = VerbConjugation::all();  // Get all roots for dropdown
        return view('derived_words.edit', compact('derivedWord', 'roots'));
    }

    public function update(Request $request, DerivedWord $derivedWord)
    {
        $request->validate([
            'root_id' => 'required|exists:verb_conjugations,id',
            'type' => 'required|string|max:50',
            'pattern' => 'required|string|max:50',
            'example' => 'required|string|max:50',
        ]);

        // Update the record and set the 'edit_by' field to the authenticated user's ID
        $derivedWord->update(array_merge($request->all(), [
            'edited_by' => Auth::id(), // Store the user ID of the person who edited the record
        ]));

        return redirect()->route('derived_words.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(DerivedWord $derivedWord)
    {
        // Soft delete by setting 'is_deleted' to 1 and setting 'edit_by' to the authenticated user's ID
        $derivedWord->update([
            'is_deleted' => 1,
            'edited_by' => Auth::id(), // Store the user ID who soft-deleted the record
        ]);

        return redirect()->route('derived_words.index')->with('success', 'تم الحذف بنجاح');
    }
}
