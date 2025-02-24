<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NasikhParticleSeeder extends Seeder
{
    public function run()
    {
        DB::table('nasikh_particles')->insert([
            [
                'name' => 'إنَّ',
                'english_name' => 'Inna',
                'meaning' => 'تفيد التوكيد',
                'example' => 'إنَّ الحقَّ واضحٌ.',
                'description' => 'حرف ناسخ يدخل على الجملة الاسمية فينصب المبتدأ ويرفع الخبر.',
                'linking_tool_id' => 20,
                'syntactic_effects' => 2,
                'semantic_logical_effects' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'أنَّ',
                'english_name' => 'Anna',
                'meaning' => 'تفيد التوكيد، وتأتي بعد أفعال القلوب',
                'example' => 'علمتُ أنَّ النجاحَ قريبٌ.',
                'description' => 'حرف ناسخ مشبه بالفعل، ينصب المبتدأ ويرفع الخبر، وغالبًا يأتي بعد أفعال القلوب مثل: علم، ظن، درى، رأى.',
                'linking_tool_id' => 20,
                'syntactic_effects' => 2,
                'semantic_logical_effects' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'كأنَّ',
                'english_name' => 'Kaanna',
                'meaning' => 'تفيد التشبيه',
                'example' => 'كأنَّ الشمسَ ذهبٌ.',
                'description' => 'حرف ناسخ يدخل على الجملة الاسمية، يفيد التشبيه، وينصب المبتدأ ويرفع الخبر.',
                'linking_tool_id' => 20,
                'syntactic_effects' => 2,
                'semantic_logical_effects' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'لكنَّ',
                'english_name' => 'Lakin',
                'meaning' => 'تفيد الاستدراك',
                'example' => 'الرجلُ قويٌّ لكنَّ المرأةَ أذكى.',
                'description' => 'حرف ناسخ يفيد الاستدراك، أي استدراك معنى الجملة السابقة.',
                'linking_tool_id' => 20,
                'syntactic_effects' => 2,
                'semantic_logical_effects' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'ليتَ',
                'english_name' => 'Layta',
                'meaning' => 'تفيد التمني',
                'example' => 'ليتَ الشبابَ يعودُ يومًا.',
                'description' => 'حرف ناسخ يفيد التمني، أي الرغبة في حدوث أمر مستحيل أو صعب التحقيق.',
                'linking_tool_id' => 20,
                'syntactic_effects' => 2,
                'semantic_logical_effects' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'لعلَّ',
                'english_name' => 'Lalla',
                'meaning' => 'تفيد الترجي أو الاحتمال',
                'example' => 'لعلَّ المطرَ قريبٌ.',
                'description' => 'حرف ناسخ يفيد الترجي (التمني القريب) أو الاحتمال.',
                'linking_tool_id' => 20,
                'syntactic_effects' => 2,
                'semantic_logical_effects' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
