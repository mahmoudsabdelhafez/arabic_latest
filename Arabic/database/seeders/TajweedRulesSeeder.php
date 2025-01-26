<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TajweedRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('tajweed_rules')->truncate();

        
        DB::table('tajweed_rules')->insert([
            [
                'rule_name' => 'الإظهار',
                'description' => 'إظهار النون الساكنة أو التنوين عند أحد حروف الحلق التي تأتي بعد النون الساكنة أو التنوين.',
                'category_id' => 1, // ID of 'أحكام النون الساكنة والتنوين'
            ],
            [
                'rule_name' => 'الإدغام',
                'description' => 'إدخال حرف ساكن بآخر متحرِّك، بحيث يصبحان حرفاً واحداً مشدَّداً.',
                'category_id' => 1, // ID of 'أحكام النون الساكنة والتنوين'
            ],
            [
                'rule_name' => 'الإقلاب',
                'description' => 'إبدال حرف مكان حرفٍ آخر مع مراعاة الغنةّ في الحرف الأول.',
                'category_id' => 1, // ID of 'أحكام النون الساكنة والتنوين'
            ],
            [
                'rule_name' => 'الإخفاء',
                'description' => 'إخفاء النون الساكنة أو التنوين مع غنّة بدرجةٍ أدنى من الإدغام.',
                'category_id' => 1, // ID of 'أحكام النون الساكنة والتنوين'
            ],
            [
                'rule_name' => 'الإخفاء الشفوي',
                'description' => 'إخفاء الميم الساكنة عند التقائها بحرف الباء.',
                'category_id' => 2, // ID of 'أحكام الميم الساكنة'
            ],
            [
                'rule_name' => 'الإدغام الشفوي',
                'description' => 'إدغام الميم الساكنة مع الميم المتحركة.',
                'category_id' => 2, // ID of 'أحكام الميم الساكنة'
            ],
            [
                'rule_name' => 'الإظهار الشفوي',
                'description' => 'إظهار الميم الساكنة عند التقائها بباقي الحروف.',
                'category_id' => 2, // ID of 'أحكام الميم الساكنة'
            ],
            [
                'rule_name' => 'إدغام المتماثلين',
                'description' => 'إدغام حرفين متماثلين مخرجاً وصِفة.',
                'category_id' => 3, // ID of 'أحكام الإدغام'
            ],
            [
                'rule_name' => 'إدغام المتجانسين',
                'description' => 'إدغام حرفين متشابهين في المخرج والمختلفين في الصفة.',
                'category_id' => 3, // ID of 'أحكام الإدغام'
            ],
            [
                'rule_name' => 'التفخيم',
                'description' => 'التفخيم يحدث في الحروف الاستعلائية مثل "خص ضغط قظ".',
                'category_id' => 4, // ID of 'أحكام التفخيم والترقيق'
            ],
            [
                'rule_name' => 'الترقيق',
                'description' => 'الترقيق يحدث في جميع الحروف ما عدا الراء واللام.',
                'category_id' => 4, // ID of 'أحكام التفخيم والترقيق'
            ],
            [
                'rule_name' => 'المد الطبيعي',
                'description' => 'المد الذي لا يكون قبله همز ولا بعده همز ولا سكون.',
                'category_id' => 5, // ID of 'أحكام المدود'
            ],
            [
                'rule_name' => 'المد الفرعي',
                'description' => 'المد الناشئ عن التقاء حرف المد مع الهمزة في نفس الكلمة أو بين كلمتين.',
                'category_id' => 5, // ID of 'أحكام المدود'
            ],
        ]);
    }
}
