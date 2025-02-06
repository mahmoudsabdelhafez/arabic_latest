<?php

namespace App\Http\Controllers;

use App\Models\Information;  // Assuming you have an Information model
use App\Models\Linking_tool;
use App\Models\LinkingTool;  // Assuming you have a LinkingTool model
use App\Models\ToolsInformation;
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

    public function showTableRows($toolName)
    {
        // Fetch the tool dynamically from the LinkingTool table
        $linkingTool = Linking_tool::where('name', $toolName)->first();
        
        if (!$linkingTool) {
            abort(404, 'Tool not found.');
        }

        // Dynamically get the data from the corresponding table
        $tableName = strtolower($toolName) . 's'; // Construct the table name (example: information)
        $rows = DB::table($tableName)->get();

        return view('tool_information.table_rows', compact('rows', 'toolName', 'linkingTool'));
    }

    public function store(Request $request)
    {
        // Validate and store the information data
        $request->validate([
            'linking_tool_id' => 'required|integer',           
            'tool_type' => 'nullable|string',                      
            'short_label' => 'nullable|string',                  
            'classification_id' => 'required|integer',            
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


        $toolName = $request->input('table_name');
        $toolType = strtolower($toolName); 

        $request->merge(['tool_type' => $toolType]);

        $toolId = $request->input('linking_tool_id'); 

          $request->merge([
            'tool_id' => $toolId
        ]);

        // Create the information record
        ToolsInformation::create([
        'linking_tool_id' => $request->input('linking_tool_id'),  // Store the linking_tool_id from the form
        'tool_type' => $request->input('tool_type'),              // Store the dynamically determined tool_type
        'tool_id' => $request->input('tool_id'),  // Store the dynamic tool_id here

        'short_label' => $request->input('short_label'),          // Store the short_label
        'classification_id' => $request->input('classification_id'),  // Store the classification_id
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

        return redirect()->route('tool_information.create')->with('success', 'Information created successfully.');
    }
}
