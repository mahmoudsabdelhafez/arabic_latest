<?php

namespace App\Http\Controllers;

use App\Models\RelativePronoun;
use App\Models\Dialect;
use Illuminate\Http\Request;

class RelativePronounController extends Controller
{
    public function index()
    {
        $relativePronouns = RelativePronoun::all();
        return view('relative_pronouns.index', compact('relativePronouns'));
    }

    public function create()
    {
        $dialects = Dialect::all();
        $relativePronouns = RelativePronoun::with('dialect')->get();
        return view('relative_pronouns.create', compact('dialects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'surface_form' => 'required',
            'dialect_id' => 'nullable|exists:dialects,id',
        ]);

        RelativePronoun::create($request->all());
        return redirect()->route('relative_pronouns.index')->with('success', 'تمت إضافة الاسم الموصول بنجاح');
    }

    public function edit(RelativePronoun $relativePronoun)
    {
        $dialects = Dialect::all();
        return view('relative_pronouns.edit', compact('relativePronoun', 'dialects'));
    }

    public function update(Request $request, RelativePronoun $relativePronoun)
    {
        $request->validate([
            'surface_form' => 'required',
            'dialect_id' => 'nullable|exists:dialects,id',
        ]);

        $relativePronoun->update($request->all());
        return redirect()->route('relative_pronouns.index')->with('success', 'تم تحديث الاسم الموصول بنجاح');
    }

    public function destroy(RelativePronoun $relativePronoun)
    {
        $relativePronoun->delete();
        return redirect()->route('relative_pronouns.index')->with('success', 'تم حذف الاسم الموصول بنجاح');
    }
}
