<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmphaticArabicLettersSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('emphatic_arabic_letters')->truncate();

        $emphatic_letters = [
            ['letter' => 'ر', 'phonetic_representation' => 'Ra'], // Ra
            ['letter' => 'ص', 'phonetic_representation' => 'Sad'], // Sad
            ['letter' => 'ض', 'phonetic_representation' => 'Dad'], // Dad
            ['letter' => 'ط', 'phonetic_representation' => 'Ta'], // Ta
            ['letter' => 'ظ', 'phonetic_representation' => 'Dha'], // Dha
            ['letter' => 'ق', 'phonetic_representation' => 'Qaf'], // Qaf
            ['letter' => 'ل', 'phonetic_representation' => 'Lam'], // Lam
        ];

        DB::table('emphatic_arabic_letters')->insert($emphatic_letters);
    }
}
