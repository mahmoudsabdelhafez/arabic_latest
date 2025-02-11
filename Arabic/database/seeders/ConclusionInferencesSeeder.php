<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class ConclusionInferencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conclusion_inferences')->insert([
            [
                'name' => 'إذن',
                'english_name' => 'Thus',
                'linking_tool_id' => 12,
                'grammatical_function' => 'أداة استنتاج',
                'semantic_function' => 'تفيد الاستنتاج',
                'example' => 'نجح الطالب، إذن فهو مجتهد.',
                'description' => 'تستخدم الأداة "إذن" للاستنتاج بناءً على المعلومات السابقة.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'لذلك',
                'english_name' => 'Therefore',
                'linking_tool_id' => 12,
                'grammatical_function' => 'أداة استنتاج',
                'semantic_function' => 'تفيد النتيجة',
                'example' => 'الطقس كان ممطراً، لذلك لم نخرج من المنزل.',
                'description' => 'تستخدم "لذلك" للربط بين السبب والنتيجة.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'بالتالي',
                'english_name' => 'Consequently',
                'linking_tool_id' => 12,
                'grammatical_function' => 'أداة استنتاج',
                'semantic_function' => 'تفيد النتيجة المتوقعة',
                'example' => 'لم يذاكر جيدًا، بالتالي لم ينجح في الامتحان.',
                'description' => 'تُستخدم "بالتالي" للإشارة إلى النتيجة الحتمية.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
