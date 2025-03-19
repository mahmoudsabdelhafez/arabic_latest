<?php
namespace App\Http\Controllers;

use App\Models\DemonstrativePronoun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // to track the authenticated user

class DemonstrativePronounController extends Controller
{
    public function index()
    {
        $records = DemonstrativePronoun::where('is_deleted', 0)->get(); // Show only non-deleted records
        return view('demonstrative_pronouns.index', compact('records'));
    }

    public function create()
    {
        return view('demonstrative_pronouns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'example' => 'required|string|max:255',
            'gender' => 'required|string|max:20',
            'number_classification' => 'required|string|max:50',
            'distance' => 'required|string|max:20',
            'grammatical_status' => 'required|string|max:20',
            'semantic_analysis' => 'required|string',
            'contextual_analysis' => 'required|string',
        ]);

        // Store the new record
        DemonstrativePronoun::create($request->all());

        return redirect()->route('demonstrative_pronouns.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(DemonstrativePronoun $demonstrativePronoun)
    {
        return view('demonstrative_pronouns.edit', compact('demonstrativePronoun'));
    }

    public function update(Request $request, DemonstrativePronoun $demonstrativePronoun)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'example' => 'required|string|max:255',
            'gender' => 'required|string|max:20',
            'number_classification' => 'required|string|max:50',
            'distance' => 'required|string|max:20',
            'grammatical_status' => 'required|string|max:20',
            'semantic_analysis' => 'required|string',
            'contextual_analysis' => 'required|string',
        ]);

        // Update the record and track the user who made the edit
        $demonstrativePronoun->update(array_merge($request->all(), [
            'edit_by' => Auth::id(), // Store the authenticated user's ID
        ]));

        return redirect()->route('demonstrative_pronouns.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(DemonstrativePronoun $demonstrativePronoun)
    {
        // Soft delete: mark as deleted instead of actual deletion
        $demonstrativePronoun->update([
            'is_deleted' => 1,
            'edit_by' => Auth::id(), // Store the authenticated user who performed the deletion
        ]);

        return redirect()->route('demonstrative_pronouns.index')->with('success', 'تم الحذف بنجاح');
    }
}
