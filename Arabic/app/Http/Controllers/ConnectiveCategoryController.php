<?php

namespace App\Http\Controllers;

use App\Models\ConnectiveCategory;
use Illuminate\Http\Request;

class ConnectiveCategoryController extends Controller
{
    public function index()
    {
        $categories = ConnectiveCategory::all();
        return view('connective_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('connective_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:connective_categories,name',
            'arabic_name' => 'required|string|max:255|unique:connective_categories,arabic_name',
            'definition' => 'nullable|string',
        ]);

        ConnectiveCategory::create($request->all());

        return redirect()->route('connective_categories.index')->with('success', 'Category created successfully.');
    }

    public function show(ConnectiveCategory $connectiveCategory)
    {
        return view('connective_categories.show', compact('connectiveCategory'));
    }

    public function edit(ConnectiveCategory $connectiveCategory)
    {
        return view('connective_categories.edit', compact('connectiveCategory'));
    }

    public function update(Request $request, ConnectiveCategory $connectiveCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:connective_categories,name,' . $connectiveCategory->id,
            'arabic_name' => 'required|string|max:255|unique:connective_categories,arabic_name,' . $connectiveCategory->id,
            'definition' => 'nullable|string',
        ]);

        $connectiveCategory->update($request->all());

        return redirect()->route('connective_categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(ConnectiveCategory $connectiveCategory)
    {
        $connectiveCategory->delete();
        return redirect()->route('connective_categories.index')->with('success', 'Category deleted successfully.');
    }
}
