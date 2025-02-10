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

        return redirect()->back()->with('success', 'Classification added successfully!');
    }

    public function show(Classification $classification)
    {
        return view('classifications.show', compact('classification'));
    }

    public function edit(Classification $classification)
    {
        return view('classifications.edit', compact('classification'));
    }

    public function update(Request $request, $id)
    {
        try {
            $classification = Classification::findOrFail($id);
    
            $validatedData = $request->validate([
                'subtool_name' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'subtype' => 'nullable|string|max:255',
                'example_sentence' => 'nullable|string',
                'description' => 'nullable|string',
                'typical_nisbah' => 'nullable|string|max:255',
                'logical_effect' => 'nullable|string|max:255',
                'semantic_effect' => 'nullable|string|max:255',
            ]);
    
            $classification->update($validatedData);
            $classification = Classification::with('linkingTool')->where('subtool_name', $request->subtool_name)
            ->where('linking_tool_id', $classification->linking_tool_id)
            ->get(); 
            return response()->json([
                'success' => true,
                'data' => $classification
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    

    public function destroy(Classification $classification)
    {
        $classification->delete();
        return redirect()->back()->with('success', 'Classification deleted successfully!');
    }
}
