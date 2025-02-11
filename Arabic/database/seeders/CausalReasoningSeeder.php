<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CausalReasoningSeeder extends Seeder
{
    public function run()
    {
        DB::table('causal_reasonings')->insert([
            [
                'name' => 'لأن',
                'english_name' => 'Because',
                'linking_tool_id' => 14,
                'grammatical_function' => 'حرف جر',
                'semantic_function' => 'تعليل',
                'example' => 'ذهبت إلى الطبيب لأنني كنت مريضًا.',
                'description' => 'تُستخدم لبيان السبب في الجملة.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'بسبب',
                'english_name' => 'Due to',
                'linking_tool_id' => 14,
                'grammatical_function' => 'حرف جر',
                'semantic_function' => 'تعليل',
                'example' => 'تأخر القطار بسبب العاصفة.',
                'description' => 'تستخدم لبيان السبب وتأتي بعد الاسم.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'لذلك',
                'english_name' => 'Therefore',
                'linking_tool_id' => 14,
                'grammatical_function' => 'حرف عطف',
                'semantic_function' => 'نتيجة',
                'example' => 'كان الجو ممطرًا، لذلك لم نخرج من المنزل.',
                'description' => 'تُستخدم لبيان النتيجة بناءً على سبب معين.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'إذن',
                'english_name' => 'Then',
                'linking_tool_id' => 14,
                'grammatical_function' => 'حرف جواب واستنتاج',
                'semantic_function' => 'نتيجة',
                'example' => 'إذا كنت تريد النجاح، إذن عليك الاجتهاد.',
                'description' => 'تُستخدم للاستنتاج بناءً على شرط أو سبب.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
