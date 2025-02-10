<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrammarRulesSeeder extends Seeder
{
    public function run()
    {
        DB::table('grammar_rules')->insert([
            ['rule_name' => 'الإعراب', 'description' => 'الرفع، النصب، الجر، الجزم.'],
            ['rule_name' => 'أنواع الأفعال', 'description' => 'متعدٍّ ولازم، صحيح ومعتل.'],
            ['rule_name' => 'التثنية والجمع', 'description' => 'مفرد، مثنى، جمع.'],
            ['rule_name' => 'المذكر والمؤنث', 'description' => 'التفرقة بين المذكر والمؤنث.'],
            ['rule_name' => 'المشتقات', 'description' => 'اسم الفاعل، اسم المفعول، المصدر…']
        ]);
    }
}

