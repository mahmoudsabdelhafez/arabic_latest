<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArabicDiacriticsSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('arabic_diacritics')->truncate();

        $diacritics = [
            ['id' => 1, 'diacritic' => 'َ', 'unicode_value' => '064E', 'name' => 'الفتحة', 'description' => 'A short /a/ sound as in "cat" (e.g., بَ = ba).', 'effect' => 'Adds a short vowel "a" sound to the phoneme.'],
        ['id' => 2, 'diacritic' => 'ِ', 'unicode_value' => '0650', 'name' => 'الكسرة', 'description' => 'A short /i/ sound as in "sit" (e.g., بِ = bi).', 'effect' => 'Adds a short vowel "i" sound to the phoneme.'],
        ['id' => 3, 'diacritic' => 'ُ', 'unicode_value' => '064F', 'name' => 'الضمة', 'description' => 'A short /u/ sound as in "put" (e.g., بُ = bu).', 'effect' => 'Adds a short vowel "u" sound to the phoneme.'],
        ['id' => 4, 'diacritic' => 'ْ', 'unicode_value' => '0652', 'name' => 'السكون', 'description' => 'Indicates the absence of a vowel (e.g., بْ = b).', 'effect' => 'No vowel sound, the phoneme remains silent.'],
        ['id' => 5, 'diacritic' => 'ّ', 'unicode_value' => '0651', 'name' => 'الشدة', 'description' => 'Indicates doubling of the consonant (e.g., بّ = bb).', 'effect' => 'Doubles the phoneme, emphasizing it.'],
        ['id' => 6, 'diacritic' => 'ً', 'unicode_value' => '064B', 'name' => 'التنوين بالفتح', 'description' => 'A final /an/ sound (e.g., بًا = ban).', 'effect' => 'Adds a short vowel "an" sound to the phoneme.'],
        ['id' => 7, 'diacritic' => 'ٍ', 'unicode_value' => '064D', 'name' => 'التنوين بالكسر', 'description' => 'A final /in/ sound (e.g., بٍ = bin).', 'effect' => 'Adds a short vowel "in" sound to the phoneme.'],
        ['id' => 8, 'diacritic' => 'ٌ', 'unicode_value' => '064C', 'name' => 'التنوين بالضم', 'description' => 'A final /un/ sound (e.g., بٌ = bun).', 'effect' => 'Adds a short vowel "un" sound to the phoneme.']
        ];


        DB::table('arabic_diacritics')->insert($diacritics);
    }
}
