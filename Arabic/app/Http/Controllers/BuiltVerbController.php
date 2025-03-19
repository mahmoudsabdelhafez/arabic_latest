<?php

namespace App\Http\Controllers;

use App\Models\BuiltVerb;
use Illuminate\Http\Request;

class BuiltVerbController extends Controller
{
    public function index()
    {
        $builtVerbs = BuiltVerb::all();
        return view('built_verbs.index', compact('builtVerbs'));
    }

    public function show(BuiltVerb $builtVerb)
    {
        return view('built_verbs.show', compact('builtVerb'));
    }

    public function store(Request $request) {
        BuiltVerb::create($request->all());
        return redirect()->back()->with('success', 'تمت الإضافة بنجاح');
    }
    
    public function update(Request $request, $id) {
        $verb = BuiltVerb::findOrFail($id);
        $verb->update($request->all());
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
    
    public function destroy($id) {
        BuiltVerb::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
