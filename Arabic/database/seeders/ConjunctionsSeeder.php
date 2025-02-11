<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ConjunctionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conjunctions')->insert([
            [
                'name' => 'و',
                'english_name' => 'And',
                'linking_tool_id' => 15,
                'grammatical_function' => 'عطف',
                'semantic_function' => 'الربط بين الجمل أو الكلمات',
                'example' => 'ذهبت إلى السوق واشتريت الفاكهة.',
                'description' => 'حرف عطف يستخدم للربط بين الكلمات أو الجمل بدون تمييز.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'أو',
                'english_name' => 'Or',
                'linking_tool_id' => 15,
                'grammatical_function' => 'عطف',
                'semantic_function' => 'تقديم خيارين أو أكثر',
                'example' => 'يمكنك شرب الشاي أو القهوة.',
                'description' => 'يستخدم لتقديم أحد الخيارين أو أكثر.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'لكن',
                'english_name' => 'But',
                'linking_tool_id' => 15,
                'grammatical_function' => 'عطف',
                'semantic_function' => 'الاستدراك',
                'example' => 'أردت الخروج لكن الجو كان ممطرًا.',
                'description' => 'يستخدم لإظهار التناقض بين الجملتين.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'بل',
                'english_name' => 'Rather',
                'linking_tool_id' => 15,
                'grammatical_function' => 'عطف',
                'semantic_function' => 'إبطال المعنى السابق',
                'example' => 'ما قاله ليس صحيحًا، بل خاطئ تمامًا.',
                'description' => 'يستخدم لإبطال المعنى الأول وتقديم بديل.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ثم',
                'english_name' => 'Then',
                'linking_tool_id' => 15,
                'grammatical_function' => 'عطف',
                'semantic_function' => 'التتابع الزمني',
                'example' => 'ذهبت إلى المدرسة ثم عدت إلى المنزل.',
                'description' => 'يستخدم لبيان الترتيب الزمني بين الأحداث.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ف',
                'english_name' => 'Then/So',
                'linking_tool_id' => 15,
                'grammatical_function' => 'عطف',
                'semantic_function' => 'التعقيب والتفسير',
                'example' => 'درست فنجحت.',
                'description' => 'يستخدم لبيان التعقيب السريع أو التفسير.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
