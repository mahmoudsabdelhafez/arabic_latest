<?php

namespace App\Http\Controllers;

use App\Models\DeletionRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeletionRuleController extends Controller
{
    /**
     * Constructor - apply auth middleware to protected routes
     */
    public function __construct()
    {
        // Apply auth middleware to all methods except index and show
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the deletion rules.
     */
    public function index()
    {
        $deletionRules = DeletionRule::where('is_deleted', false)->paginate(10);
        return view('deletion_rules.index', compact('deletionRules'));
    }

    /**
     * Show the form for creating a new deletion rule.
     */
    public function create()
    {
        return view('deletion_rules.create');
    }

    /**
     * Store a newly created deletion rule in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'case_type' => 'required|string|max:255',
            'conditions' => 'required|string',
            'examples' => 'nullable|string',
            'explanation' => 'required|string',
            'notes' => 'nullable|string',
            'deletion_reason' => 'required|string',
        ]);

        // Add the current user as the editor
        $validated['edit_by'] = Auth::id();
        
        DeletionRule::create($validated);

        return redirect()->route('deletion-rules.index')
            ->with('success', 'تم إنشاء قاعدة الحذف بنجاح.');
    }

    /**
     * Display the specified deletion rule.
     */
    public function show(DeletionRule $deletionRule)
    {
        return view('deletion_rules.show', compact('deletionRule'));
    }

    /**
     * Show the form for editing the specified deletion rule.
     */
    public function edit(DeletionRule $deletionRule)
    {
        return view('deletion_rules.edit', compact('deletionRule'));
    }

    /**
     * Update the specified deletion rule in storage.
     */
    public function update(Request $request, DeletionRule $deletionRule)
    {
        $validated = $request->validate([
            'case_type' => 'required|string|max:255',
            'conditions' => 'required|string',
            'examples' => 'nullable|string',
            'explanation' => 'required|string',
            'notes' => 'nullable|string',
            'deletion_reason' => 'required|string',
            'is_deleted' => 'boolean',
        ]);

        // Update the editor
        $validated['edit_by'] = Auth::id();
        
        $deletionRule->update($validated);

        return redirect()->route('deletion-rules.index')
            ->with('success', 'تم تحديث قاعدة الحذف بنجاح.');
    }

    /**
     * Remove the specified deletion rule from storage.
     */
    public function destroy(DeletionRule $deletionRule)
    {
        $deletionRule->update([
            'is_deleted' => true,
            'edit_by' => auth()->id()
        ]);
        return redirect()->route('deletion-rules.index')
            ->with('success', 'تم حذف قاعدة الحذف بنجاح.');
    }
   
}