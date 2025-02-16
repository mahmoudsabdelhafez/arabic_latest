<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesSeeder extends Seeder
{
    public function run()
    {
        DB::table('arabic_features')->insert([
            [
                'word_type_id' => 2, // Assuming 2 represents 'verb'
                'example_text' => "يقترن بـ الزمن (الماضي، المضارع، الأمر).",
            ],
            [
                'word_type_id' => 2,
                'example_text' => "يقبل الفاعل (كتبَ الطالبُ الدرسَ).",
            ],
            [
                'word_type_id' => 2,
                'example_text' => "المضارع يبدأ بـ أ، ن، ي، ت (أكتبُ، نكتبُ، يكتبُ، تكتبُ).",
            ],
            [
                'word_type_id' => 3, // Assuming 3 represents 'particle'
                'example_text' => "لا يقبل علامات الاسم أو الفعل.",
            ],
            [
                'word_type_id' => 3,
                'example_text' => "لا يدل على زمن أو حدث.",
            ],
            [
                'word_type_id' => 1, // Assuming 1 represents 'noun'
                'example_text' => "التنوين: (كتابٌ، معلمًا، زهرةٍ)",
            ],
            [
                'word_type_id' => 1,
                'example_text' => "أل التعريف: (المدرسة، الشمس، القلم)",
            ],
            [
                'word_type_id' => 1,
                'example_text' => "الإضافة إلى اسم آخر: (كتاب الطالب، سيارة أحمد)",
            ],
        ]);
    }
}
