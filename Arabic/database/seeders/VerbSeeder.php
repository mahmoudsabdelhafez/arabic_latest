<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VerbSeeder extends Seeder
{
    public function run()
    {
        // Insert into verb_types table
        // DB::table('verb_types')->insert([
        //     [
        //         'arabic_name' => 'متعدي',
        //         'description' => 'فعل يحتاج إلى مفعول به ليكمل معناه',
        //         'example' => 'أكلَ الولدُ التفاحةَ',
        //         'notes' => NULL,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'arabic_name' => 'لازم',
        //         'description' => 'فعل يكتفي بفاعله ولا يحتاج إلى مفعول به',
        //         'example' => 'جلسَ الرجلُ',
        //         'notes' => NULL,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ]);

        // // Insert into sensual_moral_types table
        // DB::table('sensual_moral_types')->insert([
        //     [
        //         'type' => 'حسي',
        //         'description' => 'يشير إلى الأمور المحسوسة والمادية',
        //         'example' => 'لمسَ الطفلُ اللعبةَ',
        //         'notes' => NULL,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'type' => 'معنوي',
        //         'description' => 'يشير إلى الأمور المجردة والمعنوية',
        //         'example' => 'أكرمَ الرجلُ ضيفَهُ',
        //         'notes' => NULL,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ]);

        // Insert into verbs table
        DB::table('verbs')->insert([
            [
                'verb' => 'أكلَ',
                'type_id' => 1, // متعدي
                'sensual_moral_type_id' => 1, // حسي
                'example' => 'أكلَ الولدُ الطعامَ',
                'notes' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'verb' => 'جلسَ',
                'type_id' => 2, // لازم
                'sensual_moral_type_id' => 2, // معنوي
                'example' => 'جلسَ الرجلُ في الحديقةِ',
                'notes' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Insert into verb_adjectives table
        DB::table('verb_adjectives')->insert([
            [
                'verb_id' => 1, // أكلَ
                'marrah_noun' => 'أكلة',
                'haiah_noun' => 'أكلية',
                'meme_noun' => 'مأكل',
                'similar_adjective' => 'آكل',
                'exaggeration_formula' => 'أكول',
                'subject_noun' => 'آكل',
                'affected_noun' => 'مأكول',
                'notes' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'verb_id' => 2, // جلسَ
                'marrah_noun' => 'جلسة',
                'haiah_noun' => 'جلسية',
                'meme_noun' => 'مجلس',
                'similar_adjective' => 'جالس',
                'exaggeration_formula' => 'جلاس',
                'subject_noun' => 'جالس',
                'affected_noun' => 'مجلس',
                'notes' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
