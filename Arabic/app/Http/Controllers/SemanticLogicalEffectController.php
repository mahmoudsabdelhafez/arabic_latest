<?php

namespace App\Http\Controllers;

use App\Models\SemanticLogicalEffect;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SemanticLogicalEffectController extends Controller
{
    public function create()
    {
        $semanticLogicalEffects = SemanticLogicalEffect::all();
        return view('semantic_logical_effects.create', compact('semanticLogicalEffects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'typical_relation' => 'required|string|max:255',
            'nisbah_type' => 'required|string|max:255',
            'semantic_roles' => 'required|string',
            'conditions' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $effect = SemanticLogicalEffect::create($request->all());

        return response()->json(['status' => 'success', 'effect' => $effect]);
    }

    public function edit($id)
{
    $effect = SemanticLogicalEffect::findOrFail($id);
    return response()->json(['status' => 'success', 'effect' => $effect]);
}


public function update(Request $request, $id)
{
    try {
        $validatedData = $request->validate([
            'typical_relation' => 'required|string|max:255',
            'nisbah_type' => 'required|string|max:255',
            'semantic_roles' => 'required|string',
            'conditions' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $effect = SemanticLogicalEffect::findOrFail($id);
        $effect->update($validatedData);

        return response()->json(['status' => 'success', 'message' => 'تم التحديث بنجاح!']);

    } catch (ValidationException $e) {
        return response()->json(['status' => 'error', 'errors' => $e->errors()], 422);
    }
}


    public function destroy($id)
    {
        $effect = SemanticLogicalEffect::findOrFail($id);
        $effect->delete();

        return response()->json(['status' => 'success']);
    }
}
