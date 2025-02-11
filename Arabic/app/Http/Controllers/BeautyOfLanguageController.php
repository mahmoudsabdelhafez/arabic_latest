<?php

namespace App\Http\Controllers;

use App\Models\BeautyOfLanguage;
use Illuminate\Http\Request;

class BeautyOfLanguageController extends Controller
{
    public function index()
    {
        $beautyOfLanguage = BeautyOfLanguage::all();
        return view('arabic_discrption.beauty_of_language', compact('beautyOfLanguage'));
    }

    public function show($id)
    {
        $beauty = BeautyOfLanguage::find($id);
        if ($beauty) {
            return response()->json($beauty);
        }
        return response()->json(['message' => 'Beauty aspect not found'], 404);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'aspect_name' => 'required|string',
            'description' => 'required|string'
        ]);

        $beauty = BeautyOfLanguage::create($validated);
        return back()->with('success', 'Beauty aspect added successfully!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'aspect_name' => 'required|string',
            'description' => 'required|string'
        ]);

        $beauty = BeautyOfLanguage::find($id);
        if ($beauty) {
            $beauty->update($validated);
            return response()->json($beauty);
        }
        return response()->json(['message' => 'Beauty aspect not found'], 404);
    }

    public function destroy($id)
    {
        $beauty = BeautyOfLanguage::find($id);
        if ($beauty) {
            $beauty->delete();
            return response()->json(['message' => 'Beauty aspect deleted successfully']);
        }
        return response()->json(['message' => 'Beauty aspect not found'], 404);
    }
}
