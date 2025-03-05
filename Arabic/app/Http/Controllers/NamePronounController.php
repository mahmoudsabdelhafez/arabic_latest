<?php

namespace App\Http\Controllers;

use App\Models\NamePronoun;
use App\Models\Parsing;
use App\Models\SyntacticEffect;
use App\Models\SemanticLogicalEffect;
use App\Models\AttachedType;
use Illuminate\Http\Request;

class NamePronounController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pronouns = NamePronoun::with(['parsing', 'syntacticEffects', 'semanticLogicalEffects', 'attachedType'])->get();
        $parsings = Parsing::all();
        $syntacticEffects = SyntacticEffect::all();
        $semanticEffects = SemanticLogicalEffect::all();
        $attachedTypes = AttachedType::all();
        
        return view('pronouns.view', compact(['pronouns','parsings','syntacticEffects','semanticEffects', 'attachedTypes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'definition' => 'required|string|max:255',
            'type' => 'required|in:attached,detached,hidden',
            'person' => 'required|in:first,second,third',
            'number' => 'required|in:single,dual,plural',
            'gender' => 'required|in:m,f,both',
            'position' => 'nullable|in:start,middle,end',
            'parsing_id' => 'nullable',
            'syntactic_effects_id' => 'nullable',
            'semantic_logical_effects_id' => 'nullable',
            'attached_type_id' => 'nullable',
            'estimated_for_hidden' => 'nullable|string|max:255',
            
            // New field validation
            'new_parsing_status' => 'nullable|required_if:create_new_parsing,1|string|max:255',
            'new_parsing_rule' => 'nullable|required_if:create_new_parsing,1|string',
            'new_parsing_example' => 'nullable|string',
            
            'new_syntactic_applied_on' => 'nullable|required_if:create_new_syntactic,1|string|max:255',
            'new_syntactic_result_case' => 'nullable|required_if:create_new_syntactic,1|string|max:255',
            'new_syntactic_context_condition' => 'nullable|string',
            'new_syntactic_priority_order' => 'nullable',
            'new_syntactic_notes' => 'nullable|string',
            
            'new_semantic_typical_relation' => 'nullable|required_if:create_new_semantic,1|string|max:255',
            'new_semantic_nisbah_type' => 'nullable|required_if:create_new_semantic,1|string|max:255',
            'new_semantic_roles' => 'nullable|required_if:create_new_semantic,1|string',
            'new_semantic_conditions' => 'nullable|string',
            'new_semantic_notes' => 'nullable|string',
            
            'new_attached_type_type' => 'nullable|required_if:create_new_attached_type,1|string|max:255',
            'new_attached_type_description' => 'nullable|string',
            'new_attached_type_notes' => 'nullable|string',
        ]);
        
        // Check if we need to create new items first
        
        // Create new parsing if requested
        if ($request->has('create_new_parsing')) {
            $parsing = Parsing::create([
                'status' => $request->new_parsing_status,
                'rule' => $request->new_parsing_rule,
                'example' => $request->new_parsing_example,
            ]);
            $validated['parsing_id'] = $parsing->id;
        }

        // Create new syntactic effects if requested
        if ($request->has('create_new_syntactic')) {
            $syntacticEffect = SyntacticEffect::create([
                'applied_on' => $request->new_syntactic_applied_on,
                'result_case' => $request->new_syntactic_result_case,
                'context_condition' => $request->new_syntactic_context_condition,
                'priority_order' => $request->new_syntactic_priority_order,
                'notes' => $request->new_syntactic_notes,
            ]);
            $validated['syntactic_effects_id'] = $syntacticEffect->id;
        }
        
        // Create new semantic logical effects if requested
        if ($request->has('create_new_semantic_logical')) {
            $semanticEffect = SemanticLogicalEffect::create([
                'typical_relation' => $request->new_semantic_typical_relation,
                'nisbah_type' => $request->new_semantic_nisbah_type,
                'semantic_roles' => $request->new_semantic_roles,
                'conditions' => $request->new_semantic_conditions,
                'notes' => $request->new_semantic_notes,
            ]);
            $validated['semantic_logical_effects_id'] = $semanticEffect->id;
        }
        
        // Create new attached type if requested
        if ($request->has('create_new_attached_type')) {
            $attachedType = AttachedType::create([
                'type' => $request->new_attached_type_type,
                'description' => $request->new_attached_type_description,
                'notes' => $request->new_attached_type_notes,
            ]);
            $validated['attached_type_id'] = $attachedType->id;
        }
        
        // Create the pronoun with our validated (and possibly updated) data
        $pronoun = NamePronoun::create($validated);

        return back()->with('success', 'تم إضافة الضمير بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NamePronoun  $pronoun
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(NamePronoun $pronoun)
    {
        return view('pronouns.show', compact('pronoun'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NamePronoun  $pronoun
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
{
    // Find the pronoun by ID with relationships
    $pronoun = NamePronoun::with(['parsing', 'syntacticEffects', 'semanticLogicalEffects', 'attachedType'])
                     ->findOrFail($id);
    
    // Return the pronoun data as JSON
    return response()->json($pronoun);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NamePronoun  $pronoun
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'definition' => 'required|string|max:255',
        'type' => 'required|string',
        'person' => 'required|string',
        'number' => 'required|string',
        'gender' => 'required|string',
        'position' => 'nullable|string',
        'estimated_for_hidden' => 'nullable|string',
        'parsing_id' => 'nullable|exists:parsings,id',
        'syntactic_effects_id' => 'nullable|exists:syntactic_effects,id',
        'semantic_logical_effects_id' => 'nullable|exists:semantic_logical_effects,id',
        'attached_type_id' => 'nullable'
    ]);

    $pronoun = NamePronoun::findOrFail($id);
    $pronoun->update($request->only([
        'name', 'definition', 'type', 'person', 'number', 'gender', 'position', 'estimated_for_hidden', 'parsing_id', 'syntactic_effects_id', 'semantic_logical_effects_id'
    ]));

    // Handling new or existing parsing
    if ($request->update_semantic_logical != '' && $request->filled('new_parsing_status')) {
        $parsing = Parsing::updateOrCreate(
            ['status' => $request->new_parsing_status],
            [
                'rule' => $request->new_parsing_rule,
                'example' => $request->new_parsing_example
            ]
        );
        $pronoun->parsing_id = $parsing->id;
    } elseif ($request->filled('parsing_id')) {
        $pronoun->parsing_id = $request->parsing_id;
    }

    // Handling new or existing syntactic effect
    if ($request->update_semantic_logical != '' && $request->filled('new_syntactic_applied_on')) {
        $syntactic = SyntacticEffect::updateOrCreate(
            ['applied_on' => $request->new_syntactic_applied_on],
            [
                'result_case' => $request->new_syntactic_result_case,
                'context_condition' => $request->new_syntactic_context_condition,
                'priority_order' => $request->new_syntactic_priority_order,
                'notes' => $request->new_syntactic_notes
            ]
        );
        $pronoun->syntactic_effects_id = $syntactic->id;
    } elseif ($request->filled('syntactic_effects_id')) {
        $pronoun->syntactic_effects_id = $request->syntactic_effects_id;
    }

    // Handling new or existing semantic logical effect
    if ($request->update_semantic_logical == $request->semantic_logical_effects_id && $request->filled('new_semantic_typical_relation')) {
        $semantic = SemanticLogicalEffect::updateOrCreate(
            ['typical_relation' => $request->new_semantic_typical_relation],
            [
                'nisbah_type' => $request->new_semantic_nisbah_type,
                'semantic_roles' => $request->new_semantic_roles,
                'conditions' => $request->new_semantic_conditions,
                'notes' => $request->new_semantic_notes
            ]
        );
        $pronoun->semantic_logical_effects_id = $semantic->id;
    } elseif ($request->filled('semantic_logical_effects_id')) {
        $pronoun->semantic_logical_effects_id = $request->semantic_logical_effects_id;
    }

    // Handling new or existing attached type
    if ($request->attached_type_id === 'add_new' && $request->filled('new_attached_type_type')) {
        $attachedType = AttachedType::create(
            ['type' => $request->new_attached_type_type]
        );
        $pronoun->attached_type_id = (int) $attachedType->id;
    } elseif ($request->filled('attached_type_id')) {
        $pronoun->attached_type_id = $request->attached_type_id;
    }

    $pronoun->save();

    return redirect()->route('pronouns.index')->with('success', 'تم تحديث الضمير بنجاح');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NamePronoun  $pronoun
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(NamePronoun $pronoun)
    {
        $pronoun->delete();

        return back()->with('success', 'تم حذف الضمير بنجاح');
    }
}