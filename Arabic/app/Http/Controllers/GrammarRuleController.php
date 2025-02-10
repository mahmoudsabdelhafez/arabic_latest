<?php

namespace App\Http\Controllers;

use App\Models\GrammarRule;
use Illuminate\Http\Request;

class GrammarRuleController extends Controller
{
    public function index()
    {
        $grammarRules = GrammarRule::all();
        return response()->json($grammarRules);
    }

    public function show($id)
    {
        $grammarRule = GrammarRule::find($id);
        if ($grammarRule) {
            return response()->json($grammarRule);
        }
        return response()->json(['message' => 'Grammar rule not found'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rule_name' => 'required|string',
            'description' => 'required|string'
        ]);

        $grammarRule = GrammarRule::create($validated);
        return response()->json($grammarRule, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'rule_name' => 'required|string',
            'description' => 'required|string'
        ]);

        $grammarRule = GrammarRule::find($id);
        if ($grammarRule) {
            $grammarRule->update($validated);
            return response()->json($grammarRule);
        }
        return response()->json(['message' => 'Grammar rule not found'], 404);
    }

    public function destroy($id)
    {
        $grammarRule = GrammarRule::find($id);
        if ($grammarRule) {
            $grammarRule->delete();
            return response()->json(['message' => 'Grammar rule deleted successfully']);
        }
        return response()->json(['message' => 'Grammar rule not found'], 404);
    }
}
