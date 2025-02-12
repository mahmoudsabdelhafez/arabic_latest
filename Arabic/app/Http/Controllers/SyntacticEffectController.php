<?php

namespace App\Http\Controllers;

use App\Models\SyntacticEffect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SyntacticEffectController extends Controller
{
    public function create()
    {
        $syntacticEffects =SyntacticEffect::all();
        return view('syntactic_effects.create' , compact('syntacticEffects'));
    }


    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'applied_on' => 'required|string|max:255',
            'result_case' => 'required|string|max:255',
            'context_condition' => 'nullable|string',
            'priority_order' => 'nullable',
            'notes' => 'nullable|string',
        ]);

        // Store data
        SyntacticEffect::create($request->all());

        // Redirect with success message
        return redirect()->route('syntactic-effects.create')->with('success', 'Syntactic Effect added successfully!');
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'applied_on' => 'required|string|max:255',
                'result_case' => 'required|string|max:255',
                'context_condition' => 'nullable|string',
                'priority_order' => 'required|in:عالي,متوسط,منخفض',
                'notes' => 'nullable|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $effect = SyntacticEffect::findOrFail($id);
            $effect->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'تم تحديث التأثير النحوي بنجاح',
                'data' => $effect
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'حدث خطأ أثناء تحديث التأثير النحوي'
            ], 500);
        }
    }

    /**
     * Remove a specific syntactic effect.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $effect = SyntacticEffect::findOrFail($id);
            $effect->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'تم حذف التأثير النحوي بنجاح'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'حدث خطأ أثناء حذف التأثير النحوي'
            ], 500);
        }
    }

}
