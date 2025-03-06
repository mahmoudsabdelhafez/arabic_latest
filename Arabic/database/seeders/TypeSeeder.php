<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('verb_types')->insert([
            [
                'arabic_name' => 'لازم',
                'description' => 'الفعل اللازم هو الفعل الذي لا يحتاج إلى مفعول به ليتم معناه.',
                'example' => 'جلسَ الطالبُ.',
                'notes' => 'هذا الفعل يكتفي بوجود الفاعل فقط.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'arabic_name' => 'متعدي',
                'description' => 'الفعل المتعدي هو الفعل الذي يحتاج إلى مفعول به لإتمام معناه.',
                'example' => 'كتبَ الطالبُ الدرسَ.',
                'notes' => 'قد يكون متعديًا لمفعول واحد أو أكثر.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
