<?php

namespace App\Http\Controllers;

use App\Models\ContextualCondition;
use App\Models\Linking_tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ContextualConditionController extends Controller
{
    public function index(Request $request)
    {
        $toolLetter = $request->letter;
        $toolId = $request->tool_id;
        // Fetch the tool dynamically from the LinkingTool table
        $linkingTool = Linking_tool::where('id', $request->linking_tool_id)->first();
        
        if (!$linkingTool) {
            abort(404, 'Tool not found.');
        }

        // Dynamically get the data from the corresponding table
        $tableName = strtolower($linkingTool->name) . 's'; // Construct the table name (example: information)
        // $rows = DB::table($tableName)->get();
        $conditions = DB::select("
    SELECT t.*, ti.*
    FROM `connective_contextual_conditions` ti
    JOIN `$tableName` t ON t.linking_tool_id = ti.linking_tool_id
    WHERE ti.tool_id = ? 
    AND t.id = ?
    LIMIT 25 OFFSET 0
", [$request->tool_id, $request->tool_id]);
        // $conditions = ContextualCondition::with('linkingTool')->get();
        return view('contextual_conditions.index', compact(['conditions','linkingTool','toolLetter','toolId']));

    //     $linkingTools = Linking_tool::all(); // Get all tools
    // return view('contextual_conditions.create', compact('linkingTools'));

    }

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
    
    public function destroy($id)
    {
        try {
            $condition = ContextualCondition::findOrFail($id);
            $condition->delete();

            return back()
                ->with('success', 'Contextual condition deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting contextual condition: ' . $e->getMessage());
        }
    }


    // public function store(Request $request)
    // {
    //     // Validate and store the contextual condition data
    //     $request->validate([
    //         'linking_tool_id' => 'required|integer',
    //         'tool_type' => 'nullable|string',
    //         'linguistic_condition' => 'nullable|string',
    //         'syntactic_context' => 'nullable|string',
    //         'semantic_context' => 'nullable|string',
    //         'outcome_effect' => 'nullable|string',
    //     ]);
    
    //     // Dynamically assign 'tool_type' based on the table name (the 'tool_name' or 'table_name')
    //     $toolName = $request->input('table_name'); // Get the table name (passed from the form)
        
    //     // Convert the table name to tool type
    //     $toolType = strtolower($toolName); // or use other transformation logic if needed (e.g., pluralize)
    
    //     // Add tool_type to the request data manually
    //     $request->merge([
    //         'tool_type' => $toolType
    //     ]);
    
    //     // Ensure tool_id is passed from the form data
    //     $toolId = $request->input('row_id'); // Get the linking tool id from the form
    
    //     // Here, tool_id corresponds to the selected row's id from the table
    //     $request->merge([
    //         'tool_id' => $toolId
    //     ]);
    
    //     // Create the contextual condition
    //     ContextualCondition::create([
    //         'linking_tool_id' => $request->input('linking_tool_id'),
    //         'tool_type' => $request->input('tool_type'),
    //         'linguistic_condition' => $request->input('linguistic_condition'),
    //         'syntactic_context' => $request->input('syntactic_context'),
    //         'semantic_context' => $request->input('semantic_context'),
    //         'outcome_effect' => $request->input('outcome_effect'),
    //         'tool_id' => $request->input('row_id'),  // Store the dynamic tool_id here
    //     ]);
    
    //     return redirect()->route('contextual_conditions.create')->with('success', 'Contextual condition created successfully.');
    // }
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request
        $validated = $request->validate([
            'linking_tool_id' => 'required|string',
            'tool_id' => 'required|string',
            'tool_type' => 'required|string',
            'linguistic_condition' => 'required|string',
            'syntactic_context' => 'required|string',
            'semantic_context' => 'required|string',
            'outcome_effect' => 'required|string',
            'example_text' => 'required|string',
            'syntactic_analysis' => 'required|string',
            'semantic_analysis' => 'required|string',
            'source_reference' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        // Create a new record using the validated data
        ContextualCondition::create($validated);  // Replace YourModel with the actual model name

        // Redirect back with a success message
        return back()->with('success', 'Record created successfully!');
    }
    
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'linking_tool_id' => 'required',
            'tool_id' => 'required',
            'tool_type' => 'required',
            'linguistic_condition' => 'required',
            'syntactic_context' => 'required',
            'semantic_context' => 'required',
            'outcome_effect' => 'required',
            'example_text' => 'required',
            'syntactic_analysis' => 'required',
            'semantic_analysis' => 'required',
            'source_reference' => 'required',
            'notes' => 'nullable'
        ]);


        try {
            $condition = ContextualCondition::findOrFail($id);
            $condition->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Contextual condition updated successfully',
                'data' => $condition
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating contextual condition: ' . $e->getMessage()
            ], 500);
        }
    }
}