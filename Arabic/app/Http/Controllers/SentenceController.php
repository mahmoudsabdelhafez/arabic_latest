<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sentence;
use App\Models\SentencesPart;

class SentenceController extends Controller
{
    /**
     * إنشاء جملة جديدة
     */
    public function store(Request $request)
    {
        $request->validate([
            'language_content_id' => 'required|exists:language_contents,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parts' => 'nullable|array',
            'parts.*.name' => 'required_with:parts|string|max:255',
            'parts.*.description' => 'nullable|string',
        ]);

        $sentence = Sentence::create($request->only(['language_content_id', 'name', 'description']));

        // إضافة الأجزاء إذا وُجدت
        if ($request->has('parts')) {
            foreach ($request->parts as $part) {
                $sentence->sentencesParts()->create($part);
            }
        }

        return response()->json(['message' => 'تم إنشاء الجملة بنجاح', 'sentence' => $sentence], 201);
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
        ]);

        $sentence->update($request->only(['name', 'description']));

        return response()->json(['message' => 'تم تحديث الجملة بنجاح', 'sentence' => $sentence], 200);
    }

    /**
     * حذف جملة
     */
    public function destroy($id)
    {
        $sentence = Sentence::findOrFail($id);
        $sentence->delete();

        return response()->json(['message' => 'تم حذف الجملة بنجاح'], 200);
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
