<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MadudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('maduds')->insert([
            'definition' => 'هو إطالة زمن جريان الصوت بحرف المد..',
            'description' => '
                للمـــد أحكـــامٌ ثلاثــةٌ تــدوم  وهــي الوجـوب والجـواز واللـزوم 
                فواجــبٌ إن جـاء همـزٌ بعـد مـد فــي كلمــة وذا بمتصــل يُعــد 
                وجــائزٌ مَــدٌّ وقصــرٌ إن فُصِـل كــلٌّ بكلمــة وهــذا المنفصــل 
                ومثـــل ذا إن عــرض الســكون وقفــــا كتعلمـــون نســـتعين 
                أو قُــدِّم الهمــزُ عــلى المـد وذا بـــدل كــآمنوا وإيمانــا خُــذَا 
                ولازمٌ إنِ الســــكونُ أُصِّــــلا وصــلا ووقفًــا بعــد مـدٍّ طُـوِّلا .',
            'mad_letters' => 'الألف الساكنة المفتوح ما قبلها: ا. الواو الساكنة المضموم ما قبلها: ُو. الياء الساكنة المكسور ما قبلها: ِي. وهذه الحروف الثلاثة متضمنة في كلمة واحدة هي: ( نوحيها ).',
            'mad_types' => ' المد الطبيعي أو الأصلي و المد الفرعي',
            'mad_additions' => 'مد العوض , مد التمكين , مد اللين , مد الصلة وينقسم الى كبرى وصغرى',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
