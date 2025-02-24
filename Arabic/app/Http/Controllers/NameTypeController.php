<?php

namespace App\Http\Controllers;

use App\Models\NameType;
use Illuminate\Http\Request;

class NameTypeController extends Controller
{
    public function index()
    {
        $nameTypes = NameType::all();
        return view('name_types.index', compact('nameTypes'));
    }

    public function create()
    {
        return view('name_types.create');
    }

    public function store(Request $request)
    {
        $request->validate(['type_name' => 'required|unique:name_types']);
        NameType::create($request->all());
        return redirect()->route('name_types.index')->with('success', 'تمت إضافة نوع الكلمة بنجاح');
    }

    public function edit(NameType $nameType)
    {
        return view('name_types.edit', compact('nameType'));
    }

    public function update(Request $request, NameType $nameType)
    {
        $request->validate(['type_name' => 'required|unique:name_types,type_name,' . $nameType->id]);
        $nameType->update($request->all());
        return redirect()->route('name_types.index')->with('success', 'تم تحديث نوع الكلمة بنجاح');
    }

    public function destroy(NameType $nameType)
    {
        $nameType->delete();
        return redirect()->route('name_types.index')->with('success', 'تم حذف نوع الكلمة بنجاح');
    }
}

