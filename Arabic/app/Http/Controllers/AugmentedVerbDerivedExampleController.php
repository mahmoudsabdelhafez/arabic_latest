<?php

namespace App\Http\Controllers;

use App\Models\AugmentedVerbDerivedExample;
use App\Models\AugmentedThreeLetterVerb;
use Illuminate\Http\Request;

class AugmentedVerbDerivedExampleController extends Controller
{
    /**
     * Display a listing of the.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examples = AugmentedVerbDerivedExample::with('pattern')->paginate(15);
        // dd($examples[0]->pattern->pattern);
        return view('augmented_verbs.index', compact('examples'));
    }
    public function augmented()
    {
        return view('augmented_verbs.index2');
    }

    /**
     * Show the form for creating a new example.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patterns = AugmentedThreeLetterVerb::all();
        return view('augmented_verbs.create', compact('patterns'));
    }

    /**
     * Store a newly created example in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'root' => 'required|string|max:255',
            'pattern_id' => 'required|exists:augmented_three_letter_verbs,id',
            'example' => 'required|string',
            'verbal_noun' => 'nullable|string',
            'mimic_noun' => 'nullable|string',
            'industrial_noun' => 'nullable|string',
            'active_participle' => 'nullable|string',
            'passive_participle' => 'nullable|string',
            'time_noun' => 'nullable|string',
            'place_noun' => 'nullable|string',
            'instrument_noun' => 'nullable|string',
            'form_noun' => 'nullable|string',
            'preference_noun' => 'nullable|string',
            'verbal_noun2' => 'nullable|string',
            'adverb' => 'nullable|string',
        ]);

        AugmentedVerbDerivedExample::create($validated);

        return back()
            ->with('success', 'Example created successfully.');
    }

    /**
     * Display the specified example.
     *
     * @param  \App\Models\AugmentedVerbDerivedExample  $example
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $example = AugmentedVerbDerivedExample::with('pattern')->findOrFail($id);
        // dd($example);
        return view('augmented_verbs.show', compact('example'));
    }

    /**
     * Show the form for editing the specified example.
     *
     * @param  \App\Models\AugmentedVerbDerivedExample  $example
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $example = AugmentedVerbDerivedExample::findOrFail($id);
        $patterns = AugmentedThreeLetterVerb::all();
        // dd($example);
        return view('augmented_verbs.edit', compact('example', 'patterns'));
    }

    /**
     * Update the specified example in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AugmentedVerbDerivedExample  $example
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AugmentedVerbDerivedExample $example)
    {
        $validated = $request->validate([
            'root' => 'required|string|max:255',
            'pattern_id' => 'required|exists:augmented_three_letter_verbs,id',
            'example' => 'required|string',
            'verbal_noun' => 'nullable|string',
            'mimic_noun' => 'nullable|string',
            'industrial_noun' => 'nullable|string',
            'active_participle' => 'nullable|string',
            'passive_participle' => 'nullable|string',
            'time_noun' => 'nullable|string',
            'place_noun' => 'nullable|string',
            'instrument_noun' => 'nullable|string',
            'form_noun' => 'nullable|string',
            'preference_noun' => 'nullable|string',
            'verbal_noun2' => 'nullable|string',
            'adverb' => 'nullable|string',
        ]);

        $example->update($validated);

        return back()->with('success', 'Example updated successfully');
    }

    /**
     * Remove the specified example from storage.
     *
     * @param  \App\Models\AugmentedVerbDerivedExample  $example
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $example = AugmentedVerbDerivedExample::findOrFail($id);
        $example->delete();

        return back()->with('success', 'Example deleted successfully');
    }
}