<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TajweedRulesDiacriticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tajweed_rules_diacritics')->insert([
            // Rule 1: الإظهار (أحكام النون الساكنة والتنوين)
            [
                'tajweed_rule_id' => 1, // الإظهار
                'letter_1_id' => 1, // أ
                'diacritic_id' => 1, // َ
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Rule 2: الإدغام (أحكام النون الساكنة والتنوين)
            [
                'tajweed_rule_id' => 2, // الإدغام
                'letter_1_id' => 28, // ي
                'diacritic_id' => 2, // ُ
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Rule 3: الإقلاب (أحكام النون الساكنة والتنوين)
            [
                'tajweed_rule_id' => 3, // الإقلاب
                'letter_1_id' => 2, // ب
                'diacritic_id' => 3, // ِ
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
