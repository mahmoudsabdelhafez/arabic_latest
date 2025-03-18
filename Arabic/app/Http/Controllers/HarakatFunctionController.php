<?php

namespace App\Http\Controllers;

use App\Models\HarakatFunction;
use App\Models\Harakat;
use Illuminate\Http\Request;

class HarakatFunctionController extends Controller
{
    /**
     * Display a listing of the harakat functions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $harakatFunctions = HarakatFunction::with(['haraka', 'editor'])
            ->where('is_deletes', false)
            ->paginate(10);
            
        return view('harakat_functions.index', compact('harakatFunctions'));
    }

    /**
     * Show the form for creating a new harakat function.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $harakats = Harakat::all();
        return view('harakat_functions.create', compact('harakats'));
    }

    /**
     * Store a newly created harakat function in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'haraka_id' => 'required|exists:harakats,id',
            'grammatical_function' => 'required|string|max:255',
            'morphological_function' => 'required|string|max:255',
        ]);

        $validated['edit_by'] = auth()->id();
        
        HarakatFunction::create($validated);
        
        return redirect()->route('harakat-functions.index')
            ->with('success', 'تم إنشاء وظيفة الحركة بنجاح');
    }

    /**
     * Display the specified harakat function.
     *
     * @param  \App\Models\HarakatFunction  $harakatFunction
     * @return \Illuminate\Http\Response
     */
    public function show(HarakatFunction $harakatFunction)
    {
        $harakatFunction->load(['haraka', 'editor', 'details']);
        return view('harakat_functions.show', compact('harakatFunction'));
    }

    /**
     * Show the form for editing the specified harakat function.
     *
     * @param  \App\Models\HarakatFunction  $harakatFunction
     * @return \Illuminate\Http\Response
     */
    public function edit(HarakatFunction $harakatFunction)
    {
        $harakats = Harakat::all();
        return view('harakat_functions.edit', compact('harakatFunction', 'harakats'));
    }

    /**
     * Update the specified harakat function in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HarakatFunction  $harakatFunction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HarakatFunction $harakatFunction)
    {
        $validated = $request->validate([
            'haraka_id' => 'required|exists:harakats,id',
            'grammatical_function' => 'required|string|max:255',
            'morphological_function' => 'required|string|max:255',
        ]);

        $validated['edit_by'] = auth()->id();
        
        $harakatFunction->update($validated);
        
        return redirect()->route('harakat-functions.index')
            ->with('success', 'تم تحديث وظيفة الحركة بنجاح');
    }

    /**
     * Soft delete the specified harakat function from storage.
     *
     * @param  \App\Models\HarakatFunction  $harakatFunction
     * @return \Illuminate\Http\Response
     */
    public function destroy(HarakatFunction $harakatFunction)
    {
        $harakatFunction->update([
            'is_deletes' => true,
            'edit_by' => auth()->id()
        ]);
        
        return redirect()->route('harakat-functions.index')
            ->with('success', 'تم حذف وظيفة الحركة بنجاح');
    }
}