<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PrefixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prefixes = [
            ['formula' => 'أ', 'usage_meaning' => 'للاستفهام أو التقرير', 'examples_from_quran' => '﴿أَفَلَا يَتَدَبَّرُونَ الْقُرْآنَ﴾ (النساء: 82)'],
            ['formula' => 'أنَّى', 'usage_meaning' => 'للسؤال عن الكيفية أو المكان', 'examples_from_quran' => '﴿أَنَّى يُحْيِي هَذِهِ اللَّهُ بَعْدَ مَوْتِهَا﴾ (البقرة: 259)'],
            ['formula' => 'أي', 'usage_meaning' => 'للسؤال عن التمييز أو التفضيل', 'examples_from_quran' => '﴿فَأَيُّ الْفَرِيقَيْنِ أَحَقُّ بِالْأَمْنِ﴾ (الأنعام: 81)'],
            ['formula' => 'أين', 'usage_meaning' => 'للسؤال عن المكان', 'examples_from_quran' => '﴿فَأَيْنَ تَذْهَبُونَ﴾ (التكوير: 26)'],
            ['formula' => 'كيف', 'usage_meaning' => 'للسؤال عن الحال أو الكيفية', 'examples_from_quran' => '﴿كَيْفَ تَكْفُرُونَ بِاللَّهِ﴾ (البقرة: 28)'],
            ['formula' => 'كم', 'usage_meaning' => 'للسؤال عن العدد أو الكمية', 'examples_from_quran' => '﴿كَمْ أَهْلَكْنَا مِنْ قَبْلِهِمْ مِنْ قَرْنٍ﴾ (مريم: 74)'],
            ['formula' => 'لم', 'usage_meaning' => 'للسؤال عن السبب', 'examples_from_quran' => '﴿لِمَ تَقُولُونَ مَا لَا تَفْعَلُونَ﴾ (الصف: 2)'],
            ['formula' => 'لماذا', 'usage_meaning' => 'للسؤال عن الغاية', 'examples_from_quran' => '﴿فَلِمَاذَا قُتِلَ أَصْحَابُ السُّبْتِ﴾ (النساء: 47)'],
            ['formula' => 'ما', 'usage_meaning' => 'للسؤال عن الشيء أو النفي', 'examples_from_quran' => '﴿مَا أَصَابَكَ مِنْ حَسَنَةٍ فَمِنَ اللَّهِ﴾ (النساء: 79)'],
            ['formula' => 'متى', 'usage_meaning' => 'للسؤال عن الزمان', 'examples_from_quran' => '﴿يَسْأَلُونَكَ مَتَى هَذَا الْوَعْدُ﴾ (يونس: 48)'],
            ['formula' => 'من', 'usage_meaning' => 'للسؤال عن الأشخاص', 'examples_from_quran' => '﴿مَنْ ذَا الَّذِي يُقْرِضُ اللَّهَ قَرْضًا حَسَنًا﴾ (البقرة: 245)'],
            ['formula' => 'هل', 'usage_meaning' => 'للاستفهام', 'examples_from_quran' => '﴿هَلْ أَتَى عَلَى الْإِنسَانِ حِينٌ مِنَ الدَّهْرِ﴾ (الإنسان: 1)'],
            ['formula' => 'لو', 'usage_meaning' => 'للشرط الامتناعي', 'examples_from_quran' => '﴿لَوْ كَانَ فِيهِمَا آلِهَةٌ إِلَّا اللَّهُ لَفَسَدَتَا﴾ (الأنبياء: 22)'],
            ['formula' => 'لولا', 'usage_meaning' => 'للتحضيض أو الامتناع', 'examples_from_quran' => '﴿لَوْلَا تَسْتَغْفِرُونَ اللَّهَ﴾ (نوح: 10)'],
            ['formula' => 'ألا', 'usage_meaning' => 'للتحضيض أو التنبيه', 'examples_from_quran' => '﴿أَلَا تَتَّقُونَ﴾ (الشعراء: 106)'],
            ['formula' => 'كـ', 'usage_meaning' => 'للتشبيه', 'examples_from_quran' => '﴿فَاجْعَلْنَا كَالْمُتَّقِينَ﴾ (ص: 28)'],
        ];

        DB::table('prefixes')->insert($prefixes);
    }
}
