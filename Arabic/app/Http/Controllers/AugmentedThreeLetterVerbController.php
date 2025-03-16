<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AugmentedThreeLetterVerb;
use App\Models\VerbConjugation;
use App\Models\VerbType;
use App\Models\WordType;

class AugmentedThreeLetterVerbController extends Controller
{
    public function index()
    {
        $verbs = AugmentedThreeLetterVerb::with(['root', 'wordType', 'verbType'])->get();
        return view('verbs.index', compact('verbs'));
    }

    public function create()
    {
        $roots = VerbConjugation::all();
        $wordTypes = WordType::all();
        $verbTypes = VerbType::all();

        return view('verbs.create', compact('roots', 'wordTypes', 'verbTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'root_id' => 'required|exists:verb_conjugations,id',
            'word_type_id' => 'required|exists:word_types,id',
            'verb_type_id' => 'required|exists:verb_types,id',
            'addition_type' => 'nullable|string',
            'pattern' => 'nullable|string',
            'pattern_name' => 'nullable|string',
            'example' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        AugmentedThreeLetterVerb::create($request->all());

        return redirect()->route('verbs.index')->with('success', 'Verb added successfully.');
    }

    public function edit(AugmentedThreeLetterVerb $verb)
    {
        return view('verbs.edit', compact('verb'));
    }

    public function update(Request $request, AugmentedThreeLetterVerb $verb)
    {
        $request->validate([
            'addition_type' => 'required|string',
            'pattern' => 'required|string',
            'pattern_name' => 'required|string',
            'example' => 'required|string'
        ]);
        $verb->update($request->all());
        return redirect()->route('verbs.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(AugmentedThreeLetterVerb $verb)
    {
        $verb->delete();
        return redirect()->route('verbs.index')->with('success', 'تم الحذف بنجاح');
    }
}