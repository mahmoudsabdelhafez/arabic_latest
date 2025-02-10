<?php

namespace App\Http\Controllers;

use App\Models\Information;  // Assuming you have an Information model
use App\Models\Linking_tool;
use App\Models\LinkingTool;  // Assuming you have a LinkingTool model
use App\Models\ToolsInformation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToolsInformationController extends Controller
{
    public function create()
    {
        // Get all linking tools, as you did before
        $linkingTools = Linking_tool::all();
        return view('tool_information.create', compact('linkingTools'));
    }

    public function showTableRows(Request $request, $toolName)
    {
        // dd($toolName);
        $toolName = $request->letter;
        // Fetch the tool dynamically from the LinkingTool table
        $linkingTool = Linking_tool::where('id', $request->linking_tool_id)->first();
        
        if (!$linkingTool) {
            abort(404, 'Tool not found.');
        }

        // Dynamically get the data from the corresponding table
        $tableName = strtolower($linkingTool->name) . 's'; // Construct the table name (example: information)
        // $rows = DB::table($tableName)->get();
        $rows = DB::select("
    SELECT t.*, ti.*
    FROM `tools_informations` ti
    JOIN `$tableName` t ON t.linking_tool_id = ti.linking_tool_id
    WHERE ti.tool_id = ? 
    AND t.id = ?
    LIMIT 25 OFFSET 0
", [$request->letter, $request->letter]);
    
        // dd($rows);
        return view('tool_information.index', compact('rows', 'toolName', 'linkingTool'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validate and store the information data
        $request->validate([
            'linking_tool_id' => 'required|integer',           
            'tool_type' => 'nullable|string',                      
            'short_label' => 'nullable|string',                  
            'morphological_form' => 'nullable|string',             
            'typical_nisbah' => 'nullable|string',                
            'primary_usage' => 'nullable|string',                
            'secondary_usages' => 'nullable|string',              
            'notes' => 'nullable|string',                         
            'example_ayah' => 'nullable|string',                  
            'example_explanation' => 'nullable|string',            
            'syntactic_analysis' => 'nullable|string',             
            'semantic_analysis' => 'nullable|string',              
        ]);


        $toolName = $request->input('table_type');
        $toolType = strtolower($toolName); 

        $request->merge(['tool_type' => $toolType]);

         
        // Create the information record
        ToolsInformation::create([
        'linking_tool_id' => $request->input('linking_tool_id'),  // Store the linking_tool_id from the form
        'tool_type' => $request->input('tool_type'),              // Store the dynamically determined tool_type
        'tool_id' => $request->input('tool_id'),  // Store the dynamic tool_id here

        'short_label' => $request->input('short_label'),          // Store the short_label
        'classification_id' => 1,  // Store the classification_id
        'morphological_form' => $request->input('morphological_form'),  // Store the morphological_form
        'typical_nisbah' => $request->input('typical_nisbah'),        // Store the typical_nisbah
        'primary_usage' => $request->input('primary_usage'),        // Store the primary_usage
        'secondary_usages' => $request->input('secondary_usages'),    // Store the secondary_usages
        'notes' => $request->input('notes'),                        // Store the notes
        'example_ayah' => $request->input('example_ayah'),          // Store the example_ayah
        'example_explanation' => $request->input('example_explanation'), // Store the example_explanation
        'syntactic_analysis' => $request->input('syntactic_analysis'),  // Store the syntactic_analysis
        'semantic_analysis' => $request->input('semantic_analysis'),   // Store the semantic_analysis
            
        ]);

        return redirect()->back()->with('success', 'Information created successfully.');
    }

    public function update(Request $request, $id)
{
    // Validate incoming data
    $validated = $request->validate([
        'morphological_form' => 'nullable|string|max:255',
        'typical_nisbah' => 'nullable|string|max:255',
        'primary_usage' => 'required|string',
        'secondary_usages' => 'nullable|string',
        'example_ayah' => 'nullable|string',
        'example_explanation' => 'nullable|string',
        'syntactic_analysis' => 'nullable|string',
        'semantic_analysis' => 'nullable|string',
        'notes' => 'nullable|string',
    ]);

    try {
        // Find the tool info or throw a 404 exception if not found
        $toolInfo = ToolsInformation::findOrFail($id);

        // Fill and update only the validated data
        $toolInfo->fill($validated);

        // Save the changes to the database
        $toolInfo->save();

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Tool information updated successfully',
            'data' => $toolInfo // Optional: Return updated data
        ]);
    } catch (\Exception $e) {
        // Return error response with the exception message
        return response()->json([
            'success' => false,
            'message' => 'Error updating tool information: ' . $e->getMessage()
        ], 500);
    }
}


    public function destroy($id)
{
    try {
        $tool = ToolsInformation::findOrFail($id);
        $tool->delete();
        return back()->with('success', 'Record deleted successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error deleting record');
    }
}
}