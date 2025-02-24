<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemanticDomain;

class SemanticDomainController extends Controller
{
    public function index()
    {
        $semanticDomains = SemanticDomain::all();
        return view('semantic_domains.index', compact('semanticDomains'));
    }

    public function create()
    {
        return view('semantic_domains.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'domain_name' => 'required|unique:semantic_domains,domain_name',
        ]);

        SemanticDomain::create($request->all());
        return redirect()->route('semantic_domains.index')->with('success', 'تمت إضافة المجال الدلالي بنجاح.');
    }

    public function edit(SemanticDomain $semanticDomain)
    {
        return view('semantic_domains.edit', compact('semanticDomain'));
    }

    public function update(Request $request, SemanticDomain $semanticDomain)
    {
        $request->validate([
            'domain_name' => 'required|unique:semantic_domains,domain_name,' . $semanticDomain->id,
        ]);

        $semanticDomain->update($request->all());
        return redirect()->route('semantic_domains.index')->with('success', 'تم تحديث المجال الدلالي بنجاح.');
    }

    public function destroy(SemanticDomain $semanticDomain)
    {
        $semanticDomain->delete();
        return redirect()->route('semantic_domains.index')->with('success', 'تم حذف المجال الدلالي بنجاح.');
    }
}
