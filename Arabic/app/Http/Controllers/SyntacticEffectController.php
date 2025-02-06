<?php

namespace App\Http\Controllers;

use App\Models\SyntacticEffect;
use Illuminate\Http\Request;

class SyntacticEffectController extends Controller
{
    public function create()
    {
        return view('syntactic_effects.create');
    }


    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'applied_on' => 'required|string|max:255',
            'result_case' => 'required|string|max:255',
            'context_condition' => 'nullable|string',
            'priority_order' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        // Store data
        SyntacticEffect::create($request->all());

        // Redirect with success message
        return redirect()->route('syntactic-effects.create')->with('success', 'Syntactic Effect added successfully!');
    }
}
