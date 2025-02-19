<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SyntacticSemanticEffectsSeeder extends Seeder
{
    public function run()
    {
        DB::table('syntactic_effects')->insert([
            ['applied_on' => 'حروف العطف', 'result_case' => 'ترتيب بدون تغيير الإعراب', 'context_condition' => 'عطف بين عناصر متشابهة', 'priority_order' => '1', 'notes' => 'مطبق على حروف العطف مثل و، أو، فَ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['applied_on' => 'حروف الجر', 'result_case' => 'جر الاسم بعدها', 'context_condition' => 'يجر الاسم المجرور', 'priority_order' => '2', 'notes' => 'مطبق على حروف الجر مثل لـ، من، على', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['applied_on' => 'أدوات الشرط', 'result_case' => 'جزم الفعل المضارع', 'context_condition' => 'جزم الشرط والجواب', 'priority_order' => '3', 'notes' => 'مطبق على إذا، إن، لو', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['applied_on' => 'حروف الاستدراك', 'result_case' => 'استدراك المعنى', 'context_condition' => 'يأتي بعد جملة ذات معنى معين', 'priority_order' => '4', 'notes' => 'مطبق على بل، ولكن', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('semantic_logical_effects')->insert([
            ['typical_relation' => 'الربط', 'nisbah_type' => 'واو', 'semantic_roles' => 'عطف', 'conditions' => 'يستخدم لربط جمل أو كلمات', 'notes' => 'يستخدم للربط دون ترتيب زمني محدد', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['typical_relation' => 'التعليل', 'nisbah_type' => 'لام', 'semantic_roles' => 'سببية', 'conditions' => 'يستخدم للتعبير عن الغرض', 'notes' => 'يستخدم مع الأفعال والأسماء', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['typical_relation' => 'الشرط', 'nisbah_type' => 'إذا', 'semantic_roles' => 'شرط وجواب', 'conditions' => 'يستخدم في الجمل الشرطية', 'notes' => 'يمكن أن يستخدم للماضي أو المضارع', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['typical_relation' => 'الاختيار', 'nisbah_type' => 'أو', 'semantic_roles' => 'خيار', 'conditions' => 'يستخدم في تقديم خيارات متعددة', 'notes' => 'يمكن أن يكون للتخيير أو التفصيل', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['typical_relation' => 'الاستدراك', 'nisbah_type' => 'بل', 'semantic_roles' => 'تصحيح', 'conditions' => 'يستخدم لتصحيح أو تعديل المعنى', 'notes' => 'يستخدم بعد النفي أو الإثبات', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
