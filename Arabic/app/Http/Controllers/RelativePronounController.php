<?php

namespace App\Http\Controllers;

use App\Models\RelativePronoun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelativePronounController extends Controller
{
    /**
     * Constructor to apply middleware
     */
    public function __construct()
    {
        // Apply auth middleware to create, edit, update, and delete methods
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relativePronouns = RelativePronoun::where('is_deleted', false)->paginate(10);
        return view('relative-pronouns.index', compact('relativePronouns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('relative-pronouns.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'example' => 'required|string',
            'grammatical_analysis' => 'required|string',
        ]);

        $validated['edit_by'] = Auth::id();
        $validated['is_deleted'] = false;

        RelativePronoun::create($validated);

        return redirect()->route('relative-pronouns.index')
            ->with('success', 'تم إضافة اسم الموصول بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(RelativePronoun $relativePronoun)
    {
        return view('relative-pronouns.show', compact('relativePronoun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RelativePronoun $relativePronoun)
    {
        return view('relative-pronouns.edit', compact('relativePronoun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RelativePronoun $relativePronoun)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'example' => 'required|string',
            'grammatical_analysis' => 'required|string',
        ]);

        $validated['edit_by'] = Auth::id();

        $relativePronoun->update($validated);

        return redirect()->route('relative-pronouns.index')
            ->with('success', 'تم تحديث اسم الموصول بنجاح');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(RelativePronoun $relativePronoun)
    {
        $relativePronoun->update([
            'is_deleted' => true,
            'edit_by' => Auth::id()
        ]);

        return redirect()->route('relative-pronouns.index')
            ->with('success', 'تم حذف اسم الموصول بنجاح');
    }
}