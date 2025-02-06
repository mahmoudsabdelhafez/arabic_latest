<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Linking_tool;
use App\Models\PhonemeCategory;
use Illuminate\Http\Request;

class LinkingToolControlller extends Controller
{
    public function index()
    {
        $tools = Linking_tool::all();
        return view('linking_tools.upload', compact('tools'));
    }

    public function create()
    {
        return view('linking_tools.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'arabic_name' => 'required|max:255'
    ]);

    Linking_tool::create($validated);

    if ($request->expectsJson()) {
        return response()->json(['success' => true]);
    }

    return redirect()->back()->with('success', 'Tool added successfully.');
}

    public function edit(Linking_tool $linkingtool)
    {
        return view('linking_tools.edit', compact('linkingtool'));
    }

    public function update(Request $request, Linking_tool $linkingtool)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'arabic_name' => 'required|max:255'
        ]);

        $linkingtool->update($validated);

        return redirect()->route('linkingtool.index')
            ->with('success', 'Tool updated successfully.');
    }

    public function destroy(Linking_tool $linkingtool)
    {
        $linkingtool->delete();
        return redirect()->route('linkingtool.index')
            ->with('success', 'Tool deleted successfully.');
    }
}