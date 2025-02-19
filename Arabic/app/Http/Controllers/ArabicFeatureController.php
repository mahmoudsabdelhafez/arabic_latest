<?php
namespace App\Http\Controllers;

use App\Models\ArabicFeature;
use App\Models\WordType;
use Illuminate\Http\Request;

class ArabicFeatureController extends Controller
{
    public function index(){
        $wordTypes = WordType::all();
        $arabicFeatures = ArabicFeature::all();
        return view('arabic_discrption.feature', compact(['arabicFeatures','wordTypes']));
    }
    public function create()
    {
        $wordTypes = WordType::all();
        return view('arabic-features.form', compact('wordTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'word_type_id' => 'required|exists:word_types,id',
            'example_text' => 'required|string|max:255',
        ]);

        ArabicFeature::create($request->all());

        return redirect()->route('arabic-features.index')->with('success', 'Arabic Feature created successfully.');
    }

    public function edit(ArabicFeature $arabicFeature)
    {
        $wordTypes = WordType::all();
        return view('arabic-features.form', compact('arabicFeature', 'wordTypes'));
    }

    public function update(Request $request, ArabicFeature $arabicFeature)
    {
        $request->validate([
            'word_type_id' => 'required|exists:word_types,id',
            'example_text' => 'required|string|max:255',
        ]);

        $arabicFeature->update($request->all());

        return redirect()->route('arabic-features.index')->with('success', 'Arabic Feature updated successfully.');
    }

    public function destroy(ArabicFeature $arabicFeature)
    {
        $arabicFeature->delete();
        return redirect()->route('arabic-features.index')->with('success', 'Arabic Feature deleted successfully.');
    }
}