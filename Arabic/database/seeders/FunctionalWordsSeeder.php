<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FunctionalWordsSeeder extends Seeder
{
    public function run()
    {
        // إدخال أنواع الكلمات الوظيفية
        DB::table('name_types')->insert([
            ['type_name' => 'relative'],
            ['type_name' => 'interrogative'],
            ['type_name' => 'conditional'],
        ]);

        // إدخال بيانات الربط بين الكلمات الوظيفية وأنواعها
        DB::table('word_type_mapping')->insert([
            ['word_id' => 1, 'type_id' => 1], // "من" كاسم موصول
            ['word_id' => 1, 'type_id' => 2], // "من" كاسم استفهام
            ['word_id' => 1, 'type_id' => 3], // "من" كاسم شرط
            ['word_id' => 2, 'type_id' => 1], // "ما" كاسم موصول
            ['word_id' => 2, 'type_id' => 2], // "ما" كاسم استفهام
            ['word_id' => 2, 'type_id' => 3], // "ما" كاسم شرط
            ['word_id' => 3, 'type_id' => 2], // "متى" كاسم استفهام
            ['word_id' => 3, 'type_id' => 3], // "متى" كاسم شرط
            ['word_id' => 4, 'type_id' => 2], // "أين" كاسم استفهام
            ['word_id' => 4, 'type_id' => 3], // "أين" كاسم شرط
        ]);

        
    }
}
