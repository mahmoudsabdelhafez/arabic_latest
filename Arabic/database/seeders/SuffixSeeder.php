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
            ['formula' => '-ها', 'usage_meaning' => 'للدلالة على ملكية الغائبة', 'examples_from_quran' => '﴿وَكَانَتْ تَحْتَهُ مَرْأَةٌ صَالِحَةٌ﴾ (التحريم: 11)'],
            ['formula' => '-هم', 'usage_meaning' => 'للدلالة على جمع الملكية', 'examples_from_quran' => '﴿رَبَّهُمْ﴾ (الكهف: 2)'],
            ['formula' => '-نا', 'usage_meaning' => 'للدلالة على الملكية أو المتكلمين', 'examples_from_quran' => '﴿إِنَّا أَنزَلْنَاهُ فِي لَيْلَةِ الْقَدْرِ﴾ (القدر: 1)'],
            ['formula' => '-انِ', 'usage_meaning' => 'للمثنى المرفوع', 'examples_from_quran' => '﴿هَذَانِ خَصْمَانِ﴾ (الحج: 19)'],
            ['formula' => '-ينِ', 'usage_meaning' => 'للمثنى المنصوب أو المجرور', 'examples_from_quran' => '﴿يَكُونَانِ عَلَيْهِمَا شُهَدَاءَ﴾ (المائدة: 106)'],
            ['formula' => '-ون', 'usage_meaning' => 'لجمع المذكر السالم', 'examples_from_quran' => '﴿يُنفِقُونَ أَمْوَالَهُمْ﴾ (البقرة: 262)'],
            ['formula' => '-ات', 'usage_meaning' => 'لجمع المؤنث السالم', 'examples_from_quran' => '﴿الْبَاقِيَاتُ الصَّالِحَاتُ﴾ (الكهف: 46)'],
            ['formula' => '-كَ', 'usage_meaning' => 'للمخاطب المفرد', 'examples_from_quran' => '﴿رَبَّكَ﴾ (الضحى: 6)'],
        ];

        DB::table('suffixes')->insert($suffixes);
    }
}
