<?php

namespace App\Http\Controllers;

use App\Models\ContextualCondition;
use App\Models\Linking_tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ContextualConditionController extends Controller
{
    // public function index()
    // {
    //     // $conditions = ContextualCondition::with('linkingTool')->get();
    //     // return view('contextual_conditions.index', compact('conditions'));

    //     $linkingTools = Linking_tool::all(); // Get all tools
    // return view('contextual_conditions.create', compact('linkingTools'));

    // }

    public function create()
    {
        $linkingTools = Linking_tool::all();
        return view('contextual_conditions.create', compact('linkingTools'));
    }


    public function showTableRows($toolName)
    {
        // Get the corresponding tool from the linking tools table
        $linkingTool = Linking_tool::where('name', $toolName)->first();
    
        if (!$linkingTool) {
            abort(404, 'Tool not found.');
        }
    
        // Dynamically get the data from the corresponding table
        $tableName = strtolower($toolName) . 's'; // Example: 'conditionals' or 'tool_name'
        $rows = DB::table($tableName)->get();
    
        return view('contextual_conditions.table_rows', compact('rows', 'toolName', 'linkingTool'));
    }
    



    public function store(Request $request)
    {
        // Validate and store the contextual condition data
        $request->validate([
            'linking_tool_id' => 'required|integer',
            'tool_type' => 'nullable|string',
            'linguistic_condition' => 'nullable|string',
            'syntactic_context' => 'nullable|string',
            'semantic_context' => 'nullable|string',
            'outcome_effect' => 'nullable|string',
        ]);
    
        // Dynamically assign 'tool_type' based on the table name (the 'tool_name' or 'table_name')
        $toolName = $request->input('table_name'); // Get the table name (passed from the form)
        
        // Convert the table name to tool type
        $toolType = strtolower($toolName); // or use other transformation logic if needed (e.g., pluralize)
    
        // Add tool_type to the request data manually
        $request->merge([
            'tool_type' => $toolType
        ]);
    
        // Ensure tool_id is passed from the form data
        $toolId = $request->input('row_id'); // Get the linking tool id from the form
    
        // Here, tool_id corresponds to the selected row's id from the table
        $request->merge([
            'tool_id' => $toolId
        ]);
    
        // Create the contextual condition
        ContextualCondition::create([
            'linking_tool_id' => $request->input('linking_tool_id'),
            'tool_type' => $request->input('tool_type'),
            'linguistic_condition' => $request->input('linguistic_condition'),
            'syntactic_context' => $request->input('syntactic_context'),
            'semantic_context' => $request->input('semantic_context'),
            'outcome_effect' => $request->input('outcome_effect'),
            'tool_id' => $request->input('row_id'),  // Store the dynamic tool_id here
        ]);
    
        return redirect()->route('contextual_conditions.create')->with('success', 'Contextual condition created successfully.');
    }
    
    

}
