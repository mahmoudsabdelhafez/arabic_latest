<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TajweedRulesLettersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tajweed_rules_letters')->insert([
            // Rule 1: الإظهار (أحكام النون الساكنة والتنوين)
            [
                'tajweed_rule_id' => 1, // الإظهار
                'letter_1_id' => 1, // أ
                'letter_2_id' => null, // No second letter
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tajweed_rule_id' => 1, // الإظهار
                'letter_1_id' => 27, // هـ
                'letter_2_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tajweed_rule_id' => 1, // الإظهار
                'letter_1_id' => 18, // ع
                'letter_2_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Rule 2: الإدغام (أحكام النون الساكنة والتنوين)
            [
                'tajweed_rule_id' => 2, // الإدغام
                'letter_1_id' => 28, // ي
                'letter_2_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tajweed_rule_id' => 2, // الإدغام
                'letter_1_id' => 10, // ر
                'letter_2_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Rule 3: الإقلاب (أحكام النون الساكنة والتنوين)
            [
                'tajweed_rule_id' => 3, // الإقلاب
                'letter_1_id' => 2, // ب
                'letter_2_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Rule 4: الإخفاء (أحكام النون الساكنة والتنوين)
            [
                'tajweed_rule_id' => 4, // الإخفاء
                'letter_1_id' => 12, // س
                'letter_2_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tajweed_rule_id' => 4, // الإخفاء
                'letter_1_id' => 15, // ض
                'letter_2_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
