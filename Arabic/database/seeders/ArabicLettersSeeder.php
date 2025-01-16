<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArabicLettersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('Arabic_letters')->truncate();


        $letters = [
            ['letter' => 'ا', 'unicode_value' => '0627'],
            ['letter' => 'ب', 'unicode_value' => '0628'],
            ['letter' => 'ت', 'unicode_value' => '062A'],
            ['letter' => 'ث', 'unicode_value' => '062B'],
            ['letter' => 'ج', 'unicode_value' => '062C'],
            ['letter' => 'ح', 'unicode_value' => '062D'],
            ['letter' => 'خ', 'unicode_value' => '062E'],
            ['letter' => 'د', 'unicode_value' => '062F'],
            ['letter' => 'ذ', 'unicode_value' => '0630'],
            ['letter' => 'ر', 'unicode_value' => '0631'],
            ['letter' => 'ز', 'unicode_value' => '0632'],
            ['letter' => 'س', 'unicode_value' => '0633'],
            ['letter' => 'ش', 'unicode_value' => '0634'],
            ['letter' => 'ص', 'unicode_value' => '0635'],
            ['letter' => 'ض', 'unicode_value' => '0636'],
            ['letter' => 'ط', 'unicode_value' => '0637'],
            ['letter' => 'ظ', 'unicode_value' => '0638'],
            ['letter' => 'ع', 'unicode_value' => '0639'],
            ['letter' => 'غ', 'unicode_value' => '063A'],
            ['letter' => 'ف', 'unicode_value' => '0641'],
            ['letter' => 'ق', 'unicode_value' => '0642'],
            ['letter' => 'ك', 'unicode_value' => '0643'],
            ['letter' => 'ل', 'unicode_value' => '0644'],
            ['letter' => 'م', 'unicode_value' => '0645'],
            ['letter' => 'ن', 'unicode_value' => '0646'],
            ['letter' => 'ه', 'unicode_value' => '0647'],
            ['letter' => 'و', 'unicode_value' => '0648'],
            ['letter' => 'ي', 'unicode_value' => '064A'],
            ['letter' => 'ء', 'unicode_value' => '0621'],
          
            
        ];

        DB::table('arabic_letters')->insert($letters);
    }
}
