<?php

namespace App\Http\Controllers;

use App\Models\WordType;
use Illuminate\Http\Request;

class WordTypeController extends Controller
{
    public function index()
    {
        $wordTypes = WordType::all();
        return response()->json($wordTypes);
    }

    public function show($id)
    {
        $wordType = WordType::find($id);
        if ($wordType) {
            return response()->json($wordType);
        }
        return response()->json(['message' => 'Word type not found'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_name' => 'required|string',
            'description' => 'required|string'
        ]);

        $wordType = WordType::create($validated);
        return response()->json($wordType, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'type_name' => 'required|string',
            'description' => 'required|string'
        ]);

        $wordType = WordType::find($id);
        if ($wordType) {
            $wordType->update($validated);
            return response()->json($wordType);
        }
        return response()->json(['message' => 'Word type not found'], 404);
    }

    public function destroy($id)
    {
        $wordType = WordType::find($id);
        if ($wordType) {
            $wordType->delete();
            return response()->json(['message' => 'Word type deleted successfully']);
        }
        return response()->json(['message' => 'Word type not found'], 404);
    }
}
