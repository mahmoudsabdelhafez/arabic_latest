<?php

namespace App\Http\Controllers;

use App\Models\Connective;
use App\Models\ConnectiveCategory;
use App\Models\SyntacticEffect;
use App\Models\SemanticLogicalEffect;
use App\Models\ToolName;
use Illuminate\Http\Request;

class ConnectiveController extends Controller
{
    public function index($id)
{
    $connectives = Connective::with(['category', 'syntacticEffect', 'semanticLogicalEffect'])->where('category_id',$id)->get();
    $categories = ConnectiveCategory::all();
    $syntacticEffects = SyntacticEffect::all();
    $semanticEffects = SemanticLogicalEffect::all();
    return view('connectives.index', compact(
        'connectives',
        'categories',
        'syntacticEffects',
        'semanticEffects'
    ));
}

    public function create()
    {
        $categories = ConnectiveCategory::all();
        $syntacticEffects = SyntacticEffect::all();
        $semanticLogicalEffects = SemanticLogicalEffect::all();
        return view('connectives.create', compact('categories', 'syntacticEffects', 'semanticLogicalEffects'));
    }

    public function store(Request $request)
{
    // التحقق من صحة البيانات
    $request->validate([
        'name' => 'required|string|max:255',
        'meaning' => 'required|string',
        'definition' => 'required|string',
        'category_id' => 'required|exists:connective_categories,id',
        'syntactic_effect_id' => 'required',
        'semantic_logical_effect_id' => 'required',
        'position' => 'required|in:start,middle,end',
        'connective_form' => 'required|in:standalone,connected,hybrid',
        'status' => 'nullable|string'
    ]);
    
        // Handle Syntactic Effect
        if ($request->syntactic_effect_id === 'new') {
            $syntacticEffect = SyntacticEffect::create([
                'applied_on' => $request->new_applied_on,
                'result_case' => $request->new_result_case,
                'context_condition' => $request->new_context_condition
            ]);
            $syntacticEffectId = $syntacticEffect->id;
        } else {
            $syntacticEffectId = $request->syntactic_effect_id;
        }
    
        // Handle Semantic Logical Effect
        if ($request->semantic_logical_effect_id === 'new') {
            $semanticEffect = SemanticLogicalEffect::create([
                'typical_relation' => $request->new_typical_relation,
                'nisbah_type' => $request->new_nisbah_type,
                'semantic_roles' => $request->new_semantic_roles
            ]);
            $semanticEffectId = $semanticEffect->id;
        } else {
            $semanticEffectId = $request->semantic_logical_effect_id;
        }
    
        // Create the main record
        $connective = Connective::create([
            'name' => $request->name,
            'pronunciation' => $request->pronunciation,
            'meaning' => $request->meaning,
            'definition' => $request->definition,
            'category_id' => $request->category_id,
            'position' => $request->position,
            'connective_form' => $request->connective_form,
            'syntactic_effect_id' => $syntacticEffectId,
            'semantic_logical_effect_id' => $semanticEffectId,
            'status' => $request->status,

        ]);
    
       
    // إضافة الرابط الجديد

    ToolName::create([
        'name'=> $request->name,
        'connective_form' => $request->connective_form,
        'connective_id'=> $connective->id,
    ]);
    // التحقق من إضافة الرابط بنجاح
    if ($connective) {

        return response()->json([
            'success' => true,
            'message' => 'تم إضافة الرابط بنجاح',
            'connective' => $connective
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'حدث خطأ أثناء إضافة الرابط'
        ], 500);
    }
}


    public function show(Connective $connective)
    {
        $connectives = Connective::with(['category', 'syntacticEffect', 'semanticLogicalEffect'])->where('category_id',$connective->id)->get();
        // dd($connective);
        $categories = ConnectiveCategory::all();
        $syntacticEffects = SyntacticEffect::all();
        $semanticEffects = SemanticLogicalEffect::all();

        return view('connectives.index', compact(
            'connectives',
            'categories',
            'syntacticEffects',
            'semanticEffects'
        ));    }

        public function edit($id)
        {
            $connective = Connective::with(['syntacticEffect', 'semanticLogicalEffect'])->findOrFail($id);
            
            return response()->json($connective);
        }
        
        public function update(Request $request, $id)
        {
            // البحث عن الرابط في قاعدة البيانات
            $connective = Connective::findOrFail($id);
    
            // تحديث بيانات الرابط
            $connective->update([
                'name' => $request->input('name'),
                'pronunciation' => $request->input('pronunciation'),
            ]);
    
            // تحديث التأثيرات النحوية
            $connective->syntacticEffect()->update([
                'applied_on' => $request->input('syntactic_effect.applied_on'),
                'result_case' => $request->input('syntactic_effect.result_case'),
                'context_condition' => $request->input('syntactic_effect.context_condition'),
                'priority_order' => $request->input('syntactic_effect.priority_order'),
            ]);
    
            // تحديث التأثيرات الدلالية المنطقية
            $connective->semanticLogicalEffect()->update([
                'typical_relation' => $request->input('semantic_effect.typical_relation'),
                'nisbah_type' => $request->input('semantic_effect.nisbah_type'),
                'semantic_roles' => $request->input('semantic_effect.semantic_roles'),
                'conditions' => $request->input('semantic_effect.conditions'),
            ]);
    
            // إعادة توجيه إلى الصفحة الرئيسية مع رسالة نجاح
            return response()->json([
                'success' => true,
                'message' => 'تم تحديث الرابط بنجاح',
                'connective' => $connective
            ], 200);       }
    public function destroy(Connective $connective)
    {
        $connective->delete();
        return back()->with('success', 'Connective deleted successfully.');
    }
}
