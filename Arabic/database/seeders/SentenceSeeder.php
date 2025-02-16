<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sentence;
use App\Models\SentencesPart;

class SentenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إدخال الجملة الاسمية
        $jumlaIsmiya = Sentence::create([
            'language_content_id' => 3, // تأكد من أن لديك ID صحيح لـ language_content
            'name' => 'الجملة الاسمية',
            'description' => 'تبدأ باسم وتتكون من المبتدأ والخبر.',
        ]);

        // إدخال أجزاء الجملة الاسمية
        SentencesPart::create([
            'sentence_id' => $jumlaIsmiya->id,
            'name' => 'المبتدأ',
            'description' => 'يدل على الشيء الذي نتحدث عنه، مثل: الطالبُ.',
        ]);

        SentencesPart::create([
            'sentence_id' => $jumlaIsmiya->id,
            'name' => 'الخبر',
            'description' => 'يخبرنا عن المبتدأ، مثل: مجتهدٌ.',
        ]);

        // إدخال الجملة الفعلية
        $jumlaFi3liya = Sentence::create([
            'language_content_id' => 3, // تأكد من أن لديك ID صحيح لـ language_content
            'name' => 'الجملة الفعلية',
            'description' => 'تبدأ بفعل وتتكون من الفعل والفاعل والمفعول به (إذا وُجد).',
        ]);

        // إدخال أجزاء الجملة الفعلية
        SentencesPart::create([
            'sentence_id' => $jumlaFi3liya->id,
            'name' => 'الفعل',
            'description' => 'يدل على الحدث، مثل: كتبَ.',
        ]);

        SentencesPart::create([
            'sentence_id' => $jumlaFi3liya->id,
            'name' => 'الفاعل',
            'description' => 'من قام بالفعل، مثل: الطالبُ.',
        ]);

        SentencesPart::create([
            'sentence_id' => $jumlaFi3liya->id,
            'name' => 'المفعول به',
            'description' => 'الشيء الذي وقع عليه الفعل (إذا وُجد)، مثل: الدرسَ.',
        ]);
    }
}
