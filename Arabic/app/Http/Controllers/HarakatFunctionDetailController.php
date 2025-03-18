<?php

namespace App\Http\Controllers;

use App\Models\HarakatFunction;
use App\Models\HarakatFunctionDetail;
use Illuminate\Http\Request;

class HarakatFunctionDetailController extends Controller
{
    /**
     * Display a listing of the function details for a specific harakat function.
     *
     * @param  \App\Models\HarakatFunction  $harakatFunction
     * @return \Illuminate\Http\Response
     */
    public function index(HarakatFunction $harakatFunction)
    {
        $details = $harakatFunction->details()->paginate(10);
        return view('harakat_function_details.index', compact('harakatFunction', 'details'));
    }

    /**
     * Show the form for creating a new function detail.
     *
     * @param  \App\Models\HarakatFunction  $harakatFunction
     * @return \Illuminate\Http\Response
     */
    public function create(HarakatFunction $harakatFunction)
    {
        return view('harakat_function_details.create', compact('harakatFunction'));
    }

    /**
     * Store a newly created function detail in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HarakatFunction  $harakatFunction
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, HarakatFunction $harakatFunction)
    {
        $validated = $request->validate([
            'function_type' => 'required|string|max:255',
            'function' => 'required|string|max:255',
            'description' => 'required|string',
            'example' => 'required|string',
        ]);

        $validated['harakat_function_id'] = $harakatFunction->id;
        $validated['edit_by'] = auth()->id();
        
        HarakatFunctionDetail::create($validated);
        
        return redirect()->route('harakat-functions.details.index', $harakatFunction)
            ->with('success', 'تم إضافة تفاصيل الوظيفة بنجاح');
    }

    /**
     * Display the specified function detail.
     *
     * @param  \App\Models\HarakatFunction  $harakatFunction
     * @param  \App\Models\HarakatFunctionDetail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(HarakatFunction $harakatFunction, HarakatFunctionDetail $detail)
    {
        return view('harakat_function_details.show', compact('harakatFunction', 'detail'));
    }

    /**
     * Show the form for editing the specified function detail.
     *
     * @param  \App\Models\HarakatFunction  $harakatFunction
     * @param  \App\Models\HarakatFunctionDetail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(HarakatFunction $harakatFunction, HarakatFunctionDetail $detail)
    {
        return view('harakat_function_details.edit', compact('harakatFunction', 'detail'));
    }

    /**
     * Update the specified function detail in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HarakatFunction  $harakatFunction
     * @param  \App\Models\HarakatFunctionDetail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HarakatFunction $harakatFunction, HarakatFunctionDetail $detail)
    {
        $validated = $request->validate([
            'function_type' => 'required|string|max:255',
            'function' => 'required|string|max:255',
            'description' => 'required|string',
            'example' => 'required|string',
        ]);

        $validated['edit_by'] = auth()->id();
        
        $detail->update($validated);
        
        return redirect()->route('harakat-functions.details.index', $harakatFunction)
            ->with('success', 'تم تحديث تفاصيل الوظيفة بنجاح');
    }

    /**
     * Remove the specified function detail from storage.
     *
     * @param  \App\Models\HarakatFunction  $harakatFunction
     * @param  \App\Models\HarakatFunctionDetail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(HarakatFunction $harakatFunction, HarakatFunctionDetail $detail)
    {
        $detail->delete();
        
        return redirect()->route('harakat-functions.details.index', $harakatFunction)
            ->with('success', 'تم حذف تفاصيل الوظيفة بنجاح');
    }
}