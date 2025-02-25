<?php

namespace App\Http\Controllers;

use App\Models\ArabicTable;
use App\Models\Connective;
use App\Models\ConnectiveCategory;
use App\Models\ToolName;
use Illuminate\Http\Request;

class ToolNameController extends Controller
{
    // Show the list of tool names
    public function index()
{
    // Get 10 tool names per page
    $toolNames = ToolName::paginate(10);
    
    // Return the view with paginated data
    return view('toolnames.index', compact('toolNames'));
}



    // Show a single tool name
    public function show($id)
    {
        $toolName = ToolName::find($id);
        return view('toolnames.show', compact('toolName'));
    }
    // Create a new tool name
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'connective_category_id' => 'nullable|exists:connective_categories,id',
            'arabic_table_id' => 'nullable|exists:arabic_tables,id',
        ]);

        $toolName = ToolName::create($request->all());
        return response()->json($toolName, 201);
    }

    // Update an existing tool name
    public function update(Request $request, $id)
    {
        $toolName = ToolName::find($id);
        if (!$toolName) {
            return response()->json(['message' => 'ToolName not found'], 404);
        }

        $request->validate([
            'name' => 'nullable|string|max:255',
            'connective_category_id' => 'nullable|exists:connective_categories,id',
            'arabic_table_id' => 'nullable|exists:arabic_tables,id',
        ]);

        $toolName->update($request->all());
        return response()->json($toolName);
    }

    // Delete a tool name
    public function destroy($id)
    {
        $toolName = ToolName::find($id);
        if (!$toolName) {
            return response()->json(['message' => 'ToolName not found'], 404);
        }

        $toolName->delete();
        return response()->json(['message' => 'ToolName deleted successfully']);
    }

    // public function create()
    // {
    //     $Connectives  = Connective::all();
    //     $arabicTables = ArabicTable::all();
    //     return view('toolnames.create',compact(['connectives','arabicTables']));
    // }
    
    public function edit($id)
    {
        $toolName = ToolName::with('connective')->find($id);
        // dd($toolName);
        return view('toolnames.edit', compact('toolName'));
    }

}