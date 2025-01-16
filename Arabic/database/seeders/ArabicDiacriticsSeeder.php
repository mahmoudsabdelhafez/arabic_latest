<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArabicDiacriticsSeeder extends Seeder
{
    public function run(): void
    {
        $diacritics = [
            // Short vowels (Harakats)
            ['diacritic' => 'َ', 'unicode_value' => '064F'], // Fatha
            ['diacritic' => 'ُ', 'unicode_value' => '064F'], // Damma
            ['diacritic' => 'ِ', 'unicode_value' => '0650'], // Kasra
            
            // Shadda (indicating doubling of a consonant)
            ['diacritic' => 'ّ', 'unicode_value' => '0651'], // Shadda
            
            // Sukoon (indicating absence of a vowel sound)
            ['diacritic' => 'ْ', 'unicode_value' => '0652'], // Sukoon
            
            // Tanween (nunation)
            ['diacritic' => 'ً', 'unicode_value' => '064B'], // Tanween Fatha
            ['diacritic' => 'ٌ', 'unicode_value' => '064C'], // Tanween Damma
            ['diacritic' => 'ٍ', 'unicode_value' => '064D'], // Tanween Kasra

            // Other diacritics
            ['diacritic' => 'ٰ', 'unicode_value' => '0670'], // Arabic Letter Superscript Alef (used in some cases for phonetic reasons)(مثل الالف الصغيرة في كلمة الرحمن)
            ['diacritic' => 'ٓ', 'unicode_value' => '0653'], // Arabic Letter Alif Wasla )(الف موصولة)
            ['diacritic' => 'ٔ', 'unicode_value' => '0671'], // Arabic Letter Hamza Above
            ['diacritic' => 'ٕ', 'unicode_value' => '0655'], // Arabic Letter Hamza Below
            
            // Maddah (elongation mark)
            ['diacritic' => 'ٔ', 'unicode_value' => '0654'], // Maddah above (usually used for extended vowels) (حركة المد ~)
        ];

        DB::table('arabic_diacritics')->insert($diacritics);
    }
}
