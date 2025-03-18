<?php

namespace App\Http\Controllers;

use App\Models\BasicTrilateralVerb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicTrilateralVerbController extends Controller
{
    // Display a listing of the basic trilateral verbs
    public function index()
    {
        // Only show non-deleted records
        $verbs = BasicTrilateralVerb::where('is_deleted', 0)->get();
        return view('basic_trilateral_verbs.index', compact('verbs'));
    }

    // Show the form for creating a new verb
    public function create()
    {
        return view('basic_trilateral_verbs.create');
    }

    // Store a newly created basic trilateral verb in storage
    public function store(Request $request)
    {
        $request->validate([
            'pattern' => 'required|string|max:255',
            'past_tense' => 'required|string|max:255',
            'present_tense' => 'required|string|max:255',
            'example_sentence' => 'required|string',
        ]);

        // Store the new verb
        BasicTrilateralVerb::create($request->all());

        return redirect()->route('basic_trilateral_verbs.index')->with('success', 'تمت الإضافة بنجاح');
    }

    // Show the form for editing the specified verb
    public function edit(BasicTrilateralVerb $basicTrilateralVerb)
    {
        return view('basic_trilateral_verbs.edit', compact('basicTrilateralVerb'));
    }

    // Update the specified verb in storage
    public function update(Request $request, BasicTrilateralVerb $basicTrilateralVerb)
    {
        $request->validate([
            'pattern' => 'required|string|max:255',
            'past_tense' => 'required|string|max:255',
            'present_tense' => 'required|string|max:255',
            'example_sentence' => 'required|string',
        ]);

        // Update the record and set the 'edited_by' field to the authenticated user's ID
        $basicTrilateralVerb->update(array_merge($request->all(), [
            'edited_by' => Auth::id(), // Store the user ID of the person who edited the record
        ]));

        return redirect()->route('basic_trilateral_verbs.index')->with('success', 'تم التحديث بنجاح');
    }

    // Soft delete the specified verb by setting 'is_deleted' to 1
    public function destroy(BasicTrilateralVerb $basicTrilateralVerb)
    {
        // Soft delete by setting 'is_deleted' to 1 and setting 'edited_by' to the authenticated user's ID
        $basicTrilateralVerb->update([
            'is_deleted' => 1,
            'edited_by' => Auth::id(), // Store the user ID who soft-deleted the record
        ]);

        return redirect()->route('basic_trilateral_verbs.index')->with('success', 'تم الحذف بنجاح');
    }
}
