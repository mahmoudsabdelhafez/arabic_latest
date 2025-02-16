<?php

namespace App\Http\Controllers;

use App\Models\ArabicFeature;
use App\Models\BeautyOfLanguage;
use App\Models\Conditional;
use App\Models\Example;
use App\Models\GrammarRule;
use App\Models\LanguageContent;
use App\Models\Linking_tool;
use App\Models\Sentence;
use App\Models\SentencesPart;
use App\Models\ToolsInformation;
use App\Models\WordType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArabicLanguageController extends Controller
{
    public function index()
    {
        // Fetch content from database
        $languageContents = LanguageContent::where('language', 'arabic')->get();
        $wordType = WordType::all();
        $examples = Example::all();
        $tools = Linking_tool::all();
        $features = ArabicFeature::all();
        $beautyOfLanguage = BeautyOfLanguage::all();
        $grammarRules = GrammarRule::all();
        $sentences = Sentence::all();
        $sentences_parts = SentencesPart::all();


        // Pass data to view
        return view('welcome', compact(['languageContents','tools','wordType','examples','features','beautyOfLanguage','grammarRules','sentences','sentences_parts']));
    }


    public function tools($id)
    {
        $tableName = Linking_tool::findOrFail($id);
        $table = strtolower($tableName->name).'s';
        $conditionals = DB::table(table: $table)
        ->select(
            "{$table}.*",
        )
        ->get();
    // dd($conditionals);
        return view('tools.subtool', compact(['conditionals','tableName']));
    }
    public function show(Request $request)
{
    $table = Linking_tool::findOrFail($request->linking_tool_id);
    $table = strtolower($table->name).'s';
    

    $conditionals = DB::table($table)
        ->leftJoin('linking_tools', "{$table}.linking_tool_id", '=', 'linking_tools.id')
        ->leftJoin('syntactic_effects', "{$table}.syntactic_effects", '=', 'syntactic_effects.id')
        ->leftJoin('semantic_logical_effects', "{$table}.semantic_logical_effects", '=', 'semantic_logical_effects.id')
        ->leftJoin('contextual_conditions', 'contextual_conditions.tool_id', '=', "{$table}.id")
        ->leftJoin('tools_informations', function ($join) {
            $join->on("tools_informations.linking_tool_id", '=', "linking_tools.id");
        }) // ضمان أن الربط صحيح
        ->select(
            "{$table}.*",
            'linking_tools.arabic_name as tool_name',
            'linking_tools.id as table_id',
            'syntactic_effects.id as syntactic_effect_id', 
            'syntactic_effects.*',
            'semantic_logical_effects.id as semantic_effect_id',
            'semantic_logical_effects.*',
            'contextual_conditions.id as condition_id',
            'contextual_conditions.*',
        );

    // التأكد من أن tool_id موجود قبل التصفية
    if (!empty($request->tool_id)) {
        $conditionals->where("{$table}.id", '=', $request->tool_id);
    }

    // فلترة `tools_informations` فقط إذا كان هناك بيانات متاحة
        $hasToolsInfo = ToolsInformation::where('linking_tool_id', $request->linking_tool_id)->where('tool_id', $request->tool_id)->get();
        // $hasToolsInfo2 = ToolsInformation::where('tool_id', $request->tool_id)->get();

    $result = $conditionals->get();

    if ($result->isEmpty()) {
        return response()->json(['message' => 'No data found'], 404);
    }

    


            // dd($result);
            $conditional = $result[0];
        return view('tools.show', compact(['conditional','hasToolsInfo']));
    }
//     public function update(Request $request)
// {
//     // Find the existing record using the linking_tool_id and tool_id from the request
//     $table = Linking_tool::findOrFail($request->linking_tool_id);
//     $table = strtolower($table->name).'s';
    
//     // Retrieve the existing record from the dynamic table
//     $conditional = DB::table($table)
//         ->leftJoin('linking_tools', "{$table}.linking_tool_id", '=', 'linking_tools.id')
//         ->leftJoin('syntactic_effects', "{$table}.syntactic_effects", '=', 'syntactic_effects.id')
//         ->leftJoin('semantic_logical_effects', "{$table}.semantic_logical_effects", '=', 'semantic_logical_effects.id')
//         ->leftJoin('contextual_conditions', 'contextual_conditions.tool_id', '=', "{$table}.id")
//         ->leftJoin('tools_informations', 'tools_informations.tool_id', '=', "{$table}.id")
//         ->select(
//             "{$table}.*",
//             'linking_tools.arabic_name as tool_name',
//             'linking_tools.id as table_id',
//             'syntactic_effects.*',
//             'semantic_logical_effects.*',
//             'contextual_conditions.*',
//             'tools_informations.*'
//         )
//         ->where("{$table}.id", '=', $request->tool_id)
//         ->first(); // Fetching single record for update
    
//     if ($conditional) {
//         // Update the main table (conditional table)
//         DB::table($table)
//             ->where('id', $request->tool_id)
//             ->update([
//                 'column_name_1' => $request->input('column_name_1'),
//                 'column_name_2' => $request->input('column_name_2'),
//                 // Add other fields as necessary
//             ]);

//         // Update related tables
//         // Update the linking_tools table
//         DB::table('linking_tools')
//             ->where('id', $request->input('linking_tool_id'))
//             ->update([
//                 'arabic_name' => $request->input('linking_tool_name'),
//                 // Add other fields you need to update
//             ]);

//         // Update syntactic_effects table
//         if ($request->has('syntactic_effects')) {
//             DB::table('syntactic_effects')
//                 ->where('id', $conditional->syntactic_effects)
//                 ->update([
//                     'effect_name' => $request->input('syntactic_effect_name'),
//                     // Add other fields as needed
//                 ]);
//         }

//         // Update semantic_logical_effects table
//         if ($request->has('semantic_logical_effects')) {
//             DB::table('semantic_logical_effects')
//                 ->where('id', $conditional->semantic_logical_effects)
//                 ->update([
//                     'effect_description' => $request->input('semantic_effect_description'),
//                     // Add other fields as needed
//                 ]);
//         }

//         // Update contextual_conditions table
//         if ($request->has('contextual_conditions')) {
//             DB::table('contextual_conditions')
//                 ->where('tool_id', $request->tool_id)
//                 ->update([
//                     'condition_name' => $request->input('contextual_condition_name'),
//                     // Add other fields as needed
//                 ]);
//         }

//         // Update tools_informations table
//         if ($request->has('tools_informations')) {
//             DB::table('tools_informations')
//                 ->where('tool_id', $request->tool_id)
//                 ->update([
//                     'info' => $request->input('tool_info'),
//                     // Add other fields as needed
//                 ]);
//         }
//     }

//     // Redirect back to the show page with a success message
//     return redirect()->route('tools.show', ['linking_tool_id' => $request->linking_tool_id, 'tool_id' => $request->tool_id])
//                      ->with('success', 'Tool and related data updated successfully');
// }

}