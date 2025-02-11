<?php

namespace App\Http\Controllers;

use App\Models\Example;
use App\Models\WordType;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $wordTypes = WordType::all();
        $examples = Example::all();
        return view("arabic_discrption.example", compact(["examples","wordTypes"]));
        // return response()->json($examples);
    }

    public function show($id)
    {
        $example = Example::find($id);
        if ($example) {
            return response()->json($example);
        }
        return response()->json(['message' => 'Example not found'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'word_type_id' => 'required|exists:word_types,id',
            'example_text' => 'required|string'
        ]);

        Example::create($validated);
        return back()->with('success', 'Example added successfully!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'word_type_id' => 'required|exists:word_types,id',
            'example_text' => 'required|string'
        ]);

        $example = Example::find($id);
        if ($example) {
            $example->update($validated);
            return response()->json($example);
        }
        return response()->json(['message' => 'Example not found'], 404);
    }

    public function destroy($id)
    {
        $example = Example::find($id);
        if ($example) {
            $example->delete();
            return response()->json(['message' => 'Example deleted successfully']);
        }
        return response()->json(['message' => 'Example not found'], 404);
    }
}
