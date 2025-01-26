<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuffixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suffixes = [
            ['formula' => 'ن', 'usage_meaning' => 'للمخاطب  هن المفرد', 'examples_from_quran' => '﴿رَبَّكَ﴾ (الضحى: 6)'],
            ['formula' => 'ت', 'usage_meaning' => 'للمخاطب الماضي المفرد', 'examples_from_quran' => 'كتبت'],
            ['formula' => 'تما', 'usage_meaning' => 'للمخاطب الماضي المثنى', 'examples_from_quran' => '﴿رَبَّكَ﴾ (الضحى: 6)'],
            ['formula' => 'تم', 'usage_meaning' => 'للمخاطب الماضي الجمع', 'examples_from_quran' => 'كتبتم'],
            ['formula' => 'تن', 'usage_meaning' => 'للمخاطب الماضي الجمع المؤنث', 'examples_from_quran' => 'كتبتن'],
            ['formula' => 'ا', 'usage_meaning' => 'للمخاطب الأمر المثنا', 'examples_from_quran' => 'اكتبا'],
            ['formula' => 'وا', 'usage_meaning' => 'للمخاطب الأمر الجمع', 'examples_from_quran' => 'اكتبوا'],
            ['formula' => 'ي', 'usage_meaning' => 'للمخاطب الأمر المفرد', 'examples_from_quran' => 'اكتبي'],
        ];

        DB::table('suffixes')->insert($suffixes);
    }
}
