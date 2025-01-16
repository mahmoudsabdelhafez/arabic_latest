<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArabicPhoneticsSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('arabic_phonetics')->truncate();

        $phonetics = [
            ['arabic_letter' => 'ا', 'phonetic_representation' => 'Alif'],
            ['arabic_letter' => 'ب', 'phonetic_representation' => 'Ba'],
            ['arabic_letter' => 'ت', 'phonetic_representation' => 'Ta'],
            ['arabic_letter' => 'ث', 'phonetic_representation' => 'Tha'],
            ['arabic_letter' => 'ج', 'phonetic_representation' => 'Jeem'],
            ['arabic_letter' => 'ح', 'phonetic_representation' => 'Haa'],
            ['arabic_letter' => 'خ', 'phonetic_representation' => 'Khaa'],
            ['arabic_letter' => 'د', 'phonetic_representation' => 'Dal'],
            ['arabic_letter' => 'ذ', 'phonetic_representation' => 'Dhal'],
            ['arabic_letter' => 'ر', 'phonetic_representation' => 'Ra'],
            ['arabic_letter' => 'ز', 'phonetic_representation' => 'Zay'],
            ['arabic_letter' => 'س', 'phonetic_representation' => 'Seen'],
            ['arabic_letter' => 'ش', 'phonetic_representation' => 'Sheen'],
            ['arabic_letter' => 'ص', 'phonetic_representation' => 'Sad'],
            ['arabic_letter' => 'ض', 'phonetic_representation' => 'Dad'],
            ['arabic_letter' => 'ط', 'phonetic_representation' => 'Taa'],
            ['arabic_letter' => 'ظ', 'phonetic_representation' => 'Dhaa'],
            ['arabic_letter' => 'ع', 'phonetic_representation' => 'Ain'],
            ['arabic_letter' => 'غ', 'phonetic_representation' => 'Ghayn'],
            ['arabic_letter' => 'ف', 'phonetic_representation' => 'Fa'],
            ['arabic_letter' => 'ق', 'phonetic_representation' => 'Qaf'],
            ['arabic_letter' => 'ك', 'phonetic_representation' => 'Kaf'],
            ['arabic_letter' => 'ل', 'phonetic_representation' => 'Lam'],
            ['arabic_letter' => 'م', 'phonetic_representation' => 'Meem'],
            ['arabic_letter' => 'ن', 'phonetic_representation' => 'Noon'],
            ['arabic_letter' => 'ه', 'phonetic_representation' => 'Ha'],
            ['arabic_letter' => 'و', 'phonetic_representation' => 'Waw'],
            ['arabic_letter' => 'ي', 'phonetic_representation' => 'Ya'],
            ['arabic_letter' => 'ؤ', 'phonetic_representation' => 'Waw Hamzah'],
            ['arabic_letter' => 'ئ', 'phonetic_representation' => 'Ya Hamzah'],
            ['arabic_letter' => 'ى', 'phonetic_representation' => 'Alif Maqsura'],
        ];

        DB::table('arabic_phonetics')->insert($phonetics);
    }
}
