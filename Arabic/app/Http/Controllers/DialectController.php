<?php

namespace App\Http\Controllers;

use App\Models\Dialect;
use Illuminate\Http\Request;

class DialectController extends Controller
{
    public function index()
    {
        $dialects = Dialect::all();
        return view('dialects.index', compact('dialects'));
    }

    public function create()
    {
        return view('dialects.create');
    }

    public function store(Request $request)
    {
        $request->validate(['dialect_name' => 'required|unique:dialects']);
        Dialect::create($request->all());
        return redirect()->route('dialects.index')->with('success', 'تمت إضافة اللهجة بنجاح');
    }

    public function edit(Dialect $dialect)
    {
        return view('dialects.edit', compact('dialect'));
    }

    public function update(Request $request, Dialect $dialect)
    {
        $request->validate(['dialect_name' => 'required|unique:dialects,dialect_name,' . $dialect->id]);
        $dialect->update($request->all());
        return redirect()->route('dialects.index')->with('success', 'تم تحديث اللهجة بنجاح');
    }

    public function destroy(Dialect $dialect)
    {
        $dialect->delete();
        return redirect()->route('dialects.index')->with('success', 'تم حذف اللهجة بنجاح');
    }
}
