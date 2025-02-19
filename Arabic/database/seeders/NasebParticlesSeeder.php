<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NasebParticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjunctive_particles')->insert([
            [
                'name' => 'أن',
                'english_name' => 'An',
                'linking_tool_id' => 18,
                'syntactic_effects' => 1,
                'semantic_logical_effects' => 1,
                'example' => 'أريد أن أتعلم.',
                'description' => 'حرف نصب يفيد التوكيد.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'لن',
                'english_name' => 'Lan',
                'linking_tool_id' => 18,
                'syntactic_effects' => 2,
                'semantic_logical_effects' => 2,
                'example' => 'لن أسافر غدًا.',
                'description' => 'حرف نصب يفيد النفي في المستقبل.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كي',
                'english_name' => 'Kay',
                'linking_tool_id' => 18,
                'syntactic_effects' => 3,
                'semantic_logical_effects' => 3,
                'example' => 'أدرس كي أنجح.',
                'description' => 'حرف نصب يفيد التعليل.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'إذن',
                'english_name' => 'Izan',
                'linking_tool_id' => 18,
                'syntactic_effects' => 4,
                'semantic_logical_effects' => 4,
                'example' => 'إذن أساعدك.',
                'description' => 'حرف نصب يفيد الاستنتاج.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'حتى',
                'english_name' => 'Hatta',
                'linking_tool_id' => 18,
                'syntactic_effects' => 5,
                'semantic_logical_effects' => 5,
                'example' => 'سأبقى هنا حتى تعود.',
                'description' => 'حرف نصب يفيد الغاية.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'إنَّ',
                'english_name' => 'Inna',
                'linking_tool_id' => 18,
                'syntactic_effects' => 6,
                'semantic_logical_effects' => 6,
                'example' => 'إن وأخواتها: إنَّ الطالبَ مجتهدٌ.',
                'description' => 'حرف توكيد ونصب.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'أنَّ',
                'english_name' => 'Anna',
                'linking_tool_id' => 18,
                'syntactic_effects' => 7,
                'semantic_logical_effects' => 7,
                'example' => 'إن وأخواتها: علمت أنَّ النجاحَ قريبٌ.',
                'description' => 'حرف توكيد ونصب.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كأنَّ',
                'english_name' => 'Kaanna',
                'linking_tool_id' => 18,
                'syntactic_effects' => 8,
                'semantic_logical_effects' => 8,
                'example' => 'إن وأخواتها: كأنَّ الجوَّ جميلٌ.',
                'description' => 'حرف تشبيه ونصب.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'لكنَّ',
                'english_name' => 'Lakinna',
                'linking_tool_id' => 18,
                'syntactic_effects' => 9,
                'semantic_logical_effects' => 9,
                'example' => 'إن وأخواتها: الطالبُ مجتهدٌ لكنَّ زميلَه كسولٌ.',
                'description' => 'حرف استدراك ونصب.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'لعلَّ',
                'english_name' => 'Lalla',
                'linking_tool_id' => 18,
                'syntactic_effects' => 10,
                'semantic_logical_effects' => 10,
                'example' => 'إن وأخواتها: لعلَّ النجاحَ قريبٌ.',
                'description' => 'حرف ترجي ونصب.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ليتَ',
                'english_name' => 'Layta',
                'linking_tool_id' => 18,
                'syntactic_effects' => 11,
                'semantic_logical_effects' => 11,
                'example' => 'إن وأخواتها: ليتَ الشبابَ يعودُ يوماً.',
                'description' => 'حرف تمني ونصب.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
