<?php

namespace App\Http\Controllers;

use App\Models\BasicTrilateralVerb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicTrilateralVerbController extends Controller
{
    /**
     * Constructor to apply middleware
     */
    public function __construct()
    {
        // Apply auth middleware to create, store, edit, update, and destroy methods
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verbs = BasicTrilateralVerb::where('is_deleted', false)
            ->orderBy('id', 'desc')
            ->paginate(10);
        
        return view('basic_verbs.index', compact('verbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basic_verbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pattern' => 'required|string|max:50',
            'past_tense' => 'required|string|max:255',
            'present_tense' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'syntactic_analysis' => 'nullable|string',
            'example_sentence' => 'nullable|string',
        ]);

        $validated['edit_by'] = Auth::id();
        $validated['is_deleted'] = false;

        BasicTrilateralVerb::create($validated);

        return redirect()->route('basic-trilateral-verbs.index')
            ->with('success', 'تمت إضافة الفعل الثلاثي بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BasicTrilateralVerb  $basicTrilateralVerb
     * @return \Illuminate\Http\Response
     */
    public function show(BasicTrilateralVerb $basicTrilateralVerb)
    {
        return view('basic_verbs.show', compact('basicTrilateralVerb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasicTrilateralVerb  $basicTrilateralVerb
     * @return \Illuminate\Http\Response
     */
    public function edit(BasicTrilateralVerb $basicTrilateralVerb)
    {
        return view('basic_verbs.edit', compact('basicTrilateralVerb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BasicTrilateralVerb  $basicTrilateralVerb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasicTrilateralVerb $basicTrilateralVerb)
    {
        $validated = $request->validate([
            'pattern' => 'required|string|max:50',
            'past_tense' => 'required|string|max:255',
            'present_tense' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'syntactic_analysis' => 'nullable|string',
            'example_sentence' => 'nullable|string',
        ]);

        $validated['edit_by'] = Auth::id();

        $basicTrilateralVerb->update($validated);

        return redirect()->route('basic-trilateral-verbs.index')
            ->with('success', 'تم تحديث الفعل الثلاثي بنجاح');
    }

    /**
     * Soft delete the specified resource.
     *
     * @param  \App\Models\BasicTrilateralVerb  $basicTrilateralVerb
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasicTrilateralVerb $basicTrilateralVerb)
    {
        $basicTrilateralVerb->update([
            'is_deleted' => true,
            'edit_by' => Auth::id()
        ]);

        return redirect()->route('basic-trilateral-verbs.index')
            ->with('success', 'تم حذف الفعل الثلاثي بنجاح');
    }
}