<?php

namespace App\Http\Controllers;

use App\Models\Connective;
use App\Models\ConnectiveCategory;
use App\Models\SyntacticEffect;
use App\Models\SemanticLogicalEffect;
use Illuminate\Http\Request;

class ConnectiveController extends Controller
{
    public function index()
{
    $connectives = Connective::with(['category', 'syntacticEffect', 'semanticLogicalEffect'])->get();
    $categories = ConnectiveCategory::all();
    $syntacticEffects = SyntacticEffect::all();
    $semanticEffects = SemanticLogicalEffect::all();
    // dd($connectives);
    return view('connectives.index', compact(
        'connectives',
        'categories',
        'syntacticEffects',
        'semanticEffects'
    ));
}

    public function create()
    {
        $categories = ConnectiveCategory::all();
        $syntacticEffects = SyntacticEffect::all();
        $semanticLogicalEffects = SemanticLogicalEffect::all();
        return view('connectives.create', compact('categories', 'syntacticEffects', 'semanticLogicalEffects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'meaning' => 'required|string',
            'category_id' => 'required|exists:connective_categories,id',
            'syntactic_effect_id' => 'required|exists:syntactic_effects,id',
            'semantic_logical_effect_id' => 'required|exists:semantic_logical_effects,id',
            'position' => 'required|in:start,middle,end',
            'connective_form' => 'required|in:standalone,connected,hybrid',
            'status' => 'nullable|string'
        ]);

        Connective::create($request->all());

        return redirect()->route('connectives.index')->with('success', 'Connective created successfully.');
    }

    public function show(Connective $connective)
    {
        return view('connectives.show', compact('connective'));
    }

    public function edit(Connective $connective)
{
    $connective->load(['category', 'syntacticEffect', 'semanticLogicalEffect']);
    return response()->json($connective);
}
public function update(Request $request, Connective $connective)
{
    try {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'pronunciation' => 'nullable|string|max:255',
            'syntactic_effect.applied_on' => 'nullable|string|max:255',
            'syntactic_effect.result_case' => 'nullable|string|max:255',
            'syntactic_effect.context_condition' => 'nullable|string',
            'syntactic_effect.priority_order' => 'nullable|string',
            'semantic_effect.typical_relation' => 'nullable|string|max:255',
            'semantic_effect.nisbah_type' => 'nullable|string|max:255',
            'semantic_effect.semantic_roles' => 'nullable|string',
            'semantic_effect.conditions' => 'nullable|string',
        ]);

        // Update the connective
        $connective->update($validatedData);

        return response()->json(['message' => 'Connective updated successfully']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    public function destroy(Connective $connective)
    {
        $connective->delete();
        return redirect()->route('connectives.index')->with('success', 'Connective deleted successfully.');
    }
}
