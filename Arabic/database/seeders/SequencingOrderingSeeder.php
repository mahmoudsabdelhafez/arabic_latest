<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SequencingOrderingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sequencing_orderings')->insert([
            [
                'name' => 'أولًا',
                'english_name' => 'Firstly',
                'linking_tool_id' => 13,
                'grammatical_function' => 'ظرف',
                'semantic_function' => 'ترتيب الأفكار',
                'example' => 'أولًا، يجب أن نحدد الأهداف.',
                'description' => 'يستخدم لتحديد أول نقطة في التسلسل.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ثم',
                'english_name' => 'Then',
                'linking_tool_id' => 13,
                'grammatical_function' => 'حرف عطف',
                'semantic_function' => 'استمرارية في التسلسل',
                'example' => 'أولًا، نغسل الخضار ثم نقطعها.',
                'description' => 'يستخدم لربط الأفكار في ترتيب زمني.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'أخيرًا',
                'english_name' => 'Finally',
                'linking_tool_id' => 13,
                'grammatical_function' => 'ظرف',
                'semantic_function' => 'الختام',
                'example' => 'أخيرًا، نقدم الطبق على الطاولة.',
                'description' => 'يستخدم للإشارة إلى آخر نقطة في التسلسل.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
