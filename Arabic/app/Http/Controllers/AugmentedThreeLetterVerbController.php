<?php

namespace App\Http\Controllers;

use App\Models\AugmentedThreeLetterVerb;
use App\Models\VerbConjugation;
use App\Models\WordType;
use App\Models\VerbType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AugmentedThreeLetterVerbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verbs = AugmentedThreeLetterVerb::with(['root', 'wordType', 'verbType', 'editor'])
            ->where('is_deleted', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);
        
        return view('augmented-three-letter-verbs.index', compact('verbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roots = VerbConjugation::all();
        $wordTypes = WordType::all();
        $verbTypes = VerbType::all();
        
        return view('augmented-three-letter-verbs.create', compact('roots', 'wordTypes', 'verbTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'root_id' => 'required|exists:verb_conjugations,id',
            'word_type_id' => 'required|exists:word_types,id',
            'verb_type_id' => 'required|exists:verb_types,id',
            'addition_type' => 'required|string|max:255',
            'pattern' => 'required|string|max:255',
            'pattern_name' => 'required|string|max:255',
            'example' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);
        
        $validated['edit_by'] = Auth::id();
        $validated['is_deleted'] = 0;
        
        AugmentedThreeLetterVerb::create($validated);
        
        return redirect()->route('augmented-three-letter-verbs.index')
            ->with('success', 'تمت إضافة الفعل الثلاثي المزيد بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AugmentedThreeLetterVerb  $augmentedThreeLetterVerb
     * @return \Illuminate\Http\Response
     */
    public function show(AugmentedThreeLetterVerb $augmentedThreeLetterVerb)
    {
        $verb = $augmentedThreeLetterVerb->load(['root', 'wordType', 'verbType', 'editor', 'phonemePositions']);
        
        return view('augmented-three-letter-verbs.show', compact('verb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AugmentedThreeLetterVerb  $augmentedThreeLetterVerb
     * @return \Illuminate\Http\Response
     */
    public function edit(AugmentedThreeLetterVerb $augmentedThreeLetterVerb)
    {
        $roots = VerbConjugation::all();
        $wordTypes = WordType::all();
        $verbTypes = VerbType::all();
        
        return view('augmented-three-letter-verbs.edit', compact('augmentedThreeLetterVerb', 'roots', 'wordTypes', 'verbTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AugmentedThreeLetterVerb  $augmentedThreeLetterVerb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AugmentedThreeLetterVerb $augmentedThreeLetterVerb)
    {
        $validated = $request->validate([
            'root_id' => 'required|exists:verb_conjugations,id',
            'word_type_id' => 'required|exists:word_types,id',
            'verb_type_id' => 'required|exists:verb_types,id',
            'addition_type' => 'required|string|max:255',
            'pattern' => 'required|string|max:255',
            'pattern_name' => 'required|string|max:255',
            'example' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);
        
        $validated['edit_by'] = Auth::id();
        
        $augmentedThreeLetterVerb->update($validated);
        
        return redirect()->route('augmented-three-letter-verbs.index')
            ->with('success', 'تم تحديث الفعل الثلاثي المزيد بنجاح');
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  \App\Models\AugmentedThreeLetterVerb  $augmentedThreeLetterVerb
     * @return \Illuminate\Http\Response
     */
    public function destroy(AugmentedThreeLetterVerb $augmentedThreeLetterVerb)
    {
        $augmentedThreeLetterVerb->update([
            'is_deleted' => 1,
            'edit_by' => Auth::id()
        ]);
        
        return redirect()->route('augmented-three-letter-verbs.index')
            ->with('success', 'تم حذف الفعل الثلاثي المزيد بنجاح');
    }
}