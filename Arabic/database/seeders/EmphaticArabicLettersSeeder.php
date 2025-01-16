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
            ['letter' => 'ص', 'phonetic_representation' => 'Sad'], // Sad
            ['letter' => 'ط', 'phonetic_representation' => 'Ta'], // Ta
            ['letter' => 'ض', 'phonetic_representation' => 'Dad'], // Dad
            ['letter' => 'ق', 'phonetic_representation' => 'Qaf'], // Qaf
            ['letter' => 'ظ', 'phonetic_representation' => 'Dha'], // Dha
            ['letter' => 'ر', 'phonetic_representation' => 'Ra'], // Ra (emphatic in some dialects)
            ['letter' => 'ل', 'phonetic_representation' => 'Lam'], // Lam (in some emphatic contexts)
        ];

        DB::table('emphatic_arabic_letters')->insert($emphatic_letters);
    }
}
