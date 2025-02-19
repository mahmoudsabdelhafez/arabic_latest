<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sentence;
use App\Models\SentencesPart;

class SentenceController extends Controller
{

    public function index(){
        $sentences = Sentence::with('sentenceParts')->get();
        // dd($sentences);
        return view("arabic_discrption.sentence", compact("sentences"));
    }
    /**
     * إنشاء جملة جديدة
     */
    public function store(Request $request)
{
    // dd($request->all());
    $request->validate([
        'language_content_id' => 'required|exists:language_contents,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'parts' => 'nullable|array',
        'parts.*.name' => 'required_with:parts|string|max:255',
        'parts.*.description' => 'nullable|string',
    ]);

    $sentence = Sentence::create($request->only(['language_content_id', 'name', 'description']));

    // Ensure parts exist and are valid before adding
    if (!empty($request->parts) && is_array($request->parts)) {
        foreach ($request->parts as $part) {
            if (!empty($part['name']) && isset($part['description'])) {
                $sentence->sentenceParts()->create([
                    'name' => $part['name'],
                    'description' => $part['description'],
                ]);
            }
        }
    }

    return back()->with('success', 'تم إنشاء الجملة بنجاح');
}



    /**
     * تحديث جملة موجودة
     */
    public function update(Request $request, $id)
{
    $sentence = Sentence::findOrFail($id);

    $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'description' => 'nullable|string',
        'parts' => 'nullable|array',
        'parts.*.id' => 'nullable|exists:sentence_parts,id',
        'parts.*.name' => 'required_with:parts|string|max:255',
        'parts.*.description' => 'nullable|string',
    ]);

    $sentence->update($request->only(['name', 'description']));

    if (!empty($request->parts) && is_array($request->parts)) {
        foreach ($request->parts as $part) {
            if (!empty($part['id'])) {
                // Update existing part
                $sentence->sentenceParts()->where('id', $part['id'])->update([
                    'name' => $part['name'],
                    'description' => $part['description'],
                ]);
            } else {
                // Create new part if no ID exists
                $sentence->sentenceParts()->create([
                    'name' => $part['name'],
                    'description' => $part['description'],
                ]);
            }
        }
    }

    return back()->with('success', 'تم تحديث الجملة وأجزائها بنجاح');
}


    /**
     * حذف جملة
     */
    public function destroy($id)
{
    $sentence = Sentence::findOrFail($id);
    
    // Delete associated parts first
    $sentence->sentenceParts()->delete();
    
    $sentence->delete();

    return back()->with('success', 'تم حذف الجملة وأجزائها بنجاح');
}

    /**
     * حذف جزء من الجملة
     */
    public function destroyPart($id)
    {
        $part = SentencesPart::findOrFail($id);
        $part->delete();

        return response()->json(['message' => 'تم حذف الجزء بنجاح'], 200);
    }
}
