<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    public function index()
    {
        $classifications = Classification::all();
        return view('classifications.index', compact('classifications'));
    }

    public function create()
    {
        return view('classifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subtype' => 'required|string|max:255',
            'linking_tool_id' => 'required|exists:linking_tools,id',
            'subtool_name' => 'required|string',
            'example_sentence' => 'required|string',
            'description' => 'required|string',
            'typical_nisbah' => 'required|string|max:255',
            'logical_effect' => 'required|string',
            'semantic_effect' => 'required|string',
        ]);

        Classification::create($request->all());

        return redirect()->route('classifications.index')->with('success', 'Classification added successfully!');
    }

    public function show(Classification $classification)
    {
        return view('classifications.show', compact('classification'));
    }

    public function edit(Classification $classification)
    {
        return view('classifications.edit', compact('classification'));
    }

    public function update(Request $request, Classification $classification)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subtype' => 'required|string|max:255',
            'linking_tool_id' => 'required|exists:linking_tools,id',
            'subtool_name' => 'required|string',
            'example_sentence' => 'required|string',
            'description' => 'required|string',
            'typical_nisbah' => 'required|string|max:255',
            'logical_effect' => 'required|string',
            'semantic_effect' => 'required|string',
        ]);

        $classification->update($request->all());

        return redirect()->route('classifications.index')->with('success', 'Classification updated successfully!');
    }

    public function destroy(Classification $classification)
    {
        $classification->delete();
        return redirect()->route('classifications.index')->with('success', 'Classification deleted successfully!');
    }
}
