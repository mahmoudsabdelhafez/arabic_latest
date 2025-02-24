<?php

namespace App\Http\Controllers;

use App\Models\FunctionalWord;
use App\Models\Dialect;
use App\Models\SemanticDomain;
use Illuminate\Http\Request;

class FunctionalWordController extends Controller
{
    public function index()
    {
        $functionalWords = FunctionalWord::with(['dialect', 'domain'])->get();
        // dd($functionalWords);
        return view('functional_words.index', compact('functionalWords'));
    }

    public function create()
    {
        $dialects = Dialect::all();
        $domains = SemanticDomain::all();
        return view('functional_words.create', compact('dialects', 'domains'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'surface_form' => 'required',
            'dialect_id' => 'nullable|exists:dialects,id',
            'domain_id' => 'nullable|exists:semantic_domains,id'
        ]);

        FunctionalWord::create($request->all());
        return redirect()->route('functional_words.index')->with('success', 'تمت إضافة الكلمة الوظيفية بنجاح');
    }

    public function edit(FunctionalWord $functionalWord)
    {
        $dialects = Dialect::all();
        $domains = SemanticDomain::all();
        return view('functional_words.edit', compact('functionalWord', 'dialects', 'domains'));
    }

    public function update(Request $request, FunctionalWord $functionalWord)
    {
        $request->validate([
            'surface_form' => 'required',
            'dialect_id' => 'nullable|exists:dialects,id',
            'domain_id' => 'nullable|exists:semantic_domains,id'
        ]);

        $functionalWord->update($request->all());
        return redirect()->route('functional_words.index')->with('success', 'تم تحديث الكلمة الوظيفية بنجاح');
    }

    public function destroy(FunctionalWord $functionalWord)
    {
        $functionalWord->delete();
        return redirect()->route('functional_words.index')->with('success', 'تم حذف الكلمة الوظيفية بنجاح');
    }
}
