<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrilateralVerbsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('augmented_verb_derived_examples')->insert([
            [
                'root' => 'كرم',
                'pattern_id' => 1,
                'example' => 'أكرم',
                'verbal_noun' => 'إكرام',
                'mimic_noun' => 'مُكرَم',
                'industrial_noun' => 'إكرامية',
                'active_participle' => 'مُكرِم',
                'passive_participle' => 'مُكرَم',
                'time_noun' => 'مُكرَم',
                'place_noun' => 'مُكرَم',
                'instrument_noun' => null,
                'form_noun' => null,
                'preference_noun' => 'أكرم',
                'verbal_noun2' => 'إكرامًا',
                'adverb' => 'مُكْرِمًا',
            ],
            [
                'root' => 'علم',
                'pattern_id' => 2,
                'example' => 'علّم',
                'verbal_noun' => 'تعليم',
                'mimic_noun' => 'مُعلَّم',
                'industrial_noun' => 'تعليمية',
                'active_participle' => 'مُعلِّم',
                'passive_participle' => 'مُعلَّم',
                'time_noun' => 'مُعلَّم',
                'place_noun' => 'مُعلَّم',
                'instrument_noun' => null,
                'form_noun' => 'تعليمة',
                'preference_noun' => null,
                'verbal_noun2' => 'تعليمًا',
                'adverb' => 'مُعَلِّمًا',
            ],
            [
                'root' => 'شارك',
                'pattern_id' => 3,
                'example' => 'شارك',
                'verbal_noun' => 'مشاركة',
                'mimic_noun' => 'مُشارَك',
                'industrial_noun' => 'مُشاركية',
                'active_participle' => 'مُشارِك',
                'passive_participle' => 'مُشارَك',
                'time_noun' => 'مُشارَك',
                'place_noun' => 'مُشارَك',
                'instrument_noun' => null,
                'form_noun' => null,
                'preference_noun' => null,
                'verbal_noun2' => 'مشاركةً',
                'adverb' => 'مُشارِكًا',
            ]
        ]);
    }
}
