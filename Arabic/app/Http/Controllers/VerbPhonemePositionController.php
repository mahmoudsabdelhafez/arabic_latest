<?php

namespace App\Http\Controllers;

use App\Models\ArabicLetter;
use App\Models\VerbPhonemePosition;
use App\Models\AugmentedThreeLetterVerb;
use App\Models\PhonemeActivity;
use App\Models\SaltomonihaFeature;
use Illuminate\Http\Request;

class VerbPhonemePositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = VerbPhonemePosition::with(['augmentedThreeLetterVerb', 'phonemeActivity' , 'phonemeActivity.phoneme'])
            ->orderBy('augmented_three_letter_verb_id')
            ->paginate(15);
            // dd($positions);
        return view('roots.angmented_root', compact('positions'));
    }
    public function getActivities($phoneme_id)
    {
        $activities = PhonemeActivity::where('phoneme_id', $phoneme_id)->get();
        return response()->json($activities);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $augmentedThreeLetterVerbs = augmentedThreeLetterVerb::with('root')->get();
        $phonemes = SaltomonihaFeature::select('letter','phoneme_id')->distinct()->get();
        // dd($phonemes);
        $phonemeActivities = PhonemeActivity::with('phoneme')->get();
        
        return view('roots.create', compact('augmentedThreeLetterVerbs', 'phonemeActivities','phonemes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'verb_conjugation_id' => 'required:verb_conjugations,id',
            'phoneme_activity_id' => 'required|exists:phoneme_activities,id',
            'position' => 'required|integer|min:1',
        ], [
            'verb_conjugation_id.required' => 'يرجى اختيار تصريف الفعل',
            'verb_conjugation_id' => 'تصريف الفعل المختار غير موجود',
            'phoneme_activity_id.required' => 'يرجى اختيار نشاط الصوت',
            'phoneme_activity_id.exists' => 'نشاط الصوت المختار غير موجود',
            'position.required' => 'يرجى إدخال الموقع',
            'position.integer' => 'يجب أن يكون الموقع رقماً صحيحاً',
            'position.min' => 'يجب أن يكون الموقع أكبر من صفر',
        ]);

        // Check if the combination already exists
        $exists = VerbPhonemePosition::where([
            'augmented_three_letter_verb_id' => $request->verb_conjugation_id,
            'phoneme_activity_id' => $request->phoneme_activity_id,
            'position' => $request->position,
        ])->exists();

        if ($exists) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'هذا الموقع الصوتي موجود بالفعل']);
        }

        // Create the new position
        VerbPhonemePosition::create([
            'augmented_three_letter_verb_id' => $request->verb_conjugation_id,
            'phoneme_activity_id' => $request->phoneme_activity_id,
            'position' => $request->position,
        ]);

        return redirect()->back()
            ->with('success', 'تم إضافة موقع الصوت بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VerbPhonemePosition  $verbPhonemePosition
     * @return \Illuminate\Http\Response
     */
    public function show(VerbPhonemePosition $verbPhonemePosition)
    {
        $position = $verbPhonemePosition->load(['augmentedThreeLetterVerb.verb', 'phonemeActivity.phoneme']);
        return view('verb-phoneme-positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VerbPhonemePosition  $verbPhonemePosition
     * @return \Illuminate\Http\Response
     */
    public function edit(VerbPhonemePosition $verbPhonemePosition)
    {
        $augmentedThreeLetterVerbs = augmentedThreeLetterVerb::with('verb')->get();
        $phonemeActivities = PhonemeActivity::with('phoneme')->get();
        
        return view('verb-phoneme-positions.edit', compact('verbPhonemePosition', 'augmentedThreeLetterVerbs', 'phonemeActivities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VerbPhonemePosition  $verbPhonemePosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VerbPhonemePosition $verbPhonemePosition)
    {
        $request->validate([
            'augmented_three_letter_verb_id' => 'required|exists:verb_conjugations,id',
            'phoneme_activity_id' => 'required|exists:phoneme_activities,id',
            'position' => 'required|integer|min:1',
        ], [
            'augmented_three_letter_verb_id.required' => 'يرجى اختيار تصريف الفعل',
            'augmented_three_letter_verb_id.exists' => 'تصريف الفعل المختار غير موجود',
            'phoneme_activity_id.required' => 'يرجى اختيار نشاط الصوت',
            'phoneme_activity_id.exists' => 'نشاط الصوت المختار غير موجود',
            'position.required' => 'يرجى إدخال الموقع',
            'position.integer' => 'يجب أن يكون الموقع رقماً صحيحاً',
            'position.min' => 'يجب أن يكون الموقع أكبر من صفر',
        ]);

        // Check if the combination already exists (except for this record)
        $exists = VerbPhonemePosition::where([
            'augmented_three_letter_verb_id' => $request->augmented_three_letter_verb_id,
            'phoneme_activity_id' => $request->phoneme_activity_id,
            'position' => $request->position,
        ])->where('id', '!=', $verbPhonemePosition->id)->exists();

        if ($exists) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'هذا الموقع الصوتي موجود بالفعل']);
        }

        // Update the position
        $verbPhonemePosition->update([
            'augmented_three_letter_verb_id' => $request->augmented_three_letter_verb_id,
            'phoneme_activity_id' => $request->phoneme_activity_id,
            'position' => $request->position,
        ]);

        return redirect()->back()
            ->with('success', 'تم تحديث موقع الصوت بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VerbPhonemePosition  $verbPhonemePosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(VerbPhonemePosition $verbPhonemePosition)
    {
        $verbPhonemePosition->delete();
        
        return redirect()->back()
            ->with('success', 'تم حذف موقع الصوت بنجاح');
    }
}