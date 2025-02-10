<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeautyOfLanguageSeeder extends Seeder
{
    public function run()
    {
        DB::table('beauty_of_language')->insert([
            ['aspect_name' => 'التشبيهات والاستعارات', 'description' => 'التشبيهات والاستعارات في الشعر العربي.'],
            ['aspect_name' => 'الإعجاز اللغوي في القرآن', 'description' => 'الإعجاز اللغوي في القرآن الكريم.'],
            ['aspect_name' => 'فن الخط العربي', 'description' => 'فن الخط العربي.'],
            ['aspect_name' => 'ثراء المعجم العربي', 'description' => 'يحتوي المعجم العربي على ملايين الكلمات والمرادفات.']
        ]);
    }
}

