<?php

namespace App\Http\Controllers;

use App\Models\AnalyzingWeakening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // to use the authenticated user

class AnalyzingWeakeningController extends Controller
{
    public function index()
    {
        $records = AnalyzingWeakening::where('is_deleted', 0)->get(); // Only show non-deleted records
        return view('analyzing_weakening.index', compact('records'));
    }

    public function create()
    {
        return view('analyzing_weakening.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'weakening_type' => 'required|string|max:255',
            'condition' => 'required|string',
            'original_word' => 'required|string',
            'change_happened' => 'required|string',
            'reason' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Store the new record
        AnalyzingWeakening::create($request->all());
        return redirect()->route('analyzing_weakening.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit(AnalyzingWeakening $analyzingWeakening)
    {
        return view('analyzing_weakening.edit', compact('analyzingWeakening'));
    }

    public function update(Request $request, AnalyzingWeakening $analyzingWeakening)
    {
        $request->validate([
            'weakening_type' => 'required|string|max:255',
            'condition' => 'required|string',
            'original_word' => 'required|string',
            'change_happened' => 'required|string',
            'reason' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Update the record and set the 'edit_by' field to the authenticated user's ID
        $analyzingWeakening->update(array_merge($request->all(), [
            'edit_by' => Auth::id(), // Store the user ID of the person who edited the record
        ]));

        return redirect()->route('analyzing_weakening.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(AnalyzingWeakening $analyzingWeakening)
    {
        // Soft delete by setting 'is_deleted' to 1 and setting 'edit_by' to the authenticated user's ID
        $analyzingWeakening->update([
            'is_deleted' => 1,
            'edit_by' => Auth::id(), // Store the user ID who soft-deleted the record
        ]);

        return redirect()->route('analyzing_weakening.index')->with('success', 'تم الحذف بنجاح');
    }
}
