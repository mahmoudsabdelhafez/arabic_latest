<?php

namespace App\Http\Controllers;

use App\Models\SemanticLogicalEffect;
use Illuminate\Http\Request;

class SemanticLogicalEffectController extends Controller
{
    public function create()
    {
        return view('semantic_logical_effects.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'typical_relation' => 'required|string|max:255',
            'nisbah_type' => 'required|string|max:255',
            'semantic_roles' => 'required|string',
            'conditions' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Store data
        SemanticLogicalEffect::create($request->all());

        // Redirect with success message
        return redirect()->route('semantic-logical-effects.create')->with('success', 'Semantic Logical Effect added successfully!');
    }
}
