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
            ['letter' => 'ا', 'unicode_hex' => '0627', 'windows_hex' => '0x0627', 'windows_decimal' => 1575, 'unicode_decimal' => 1575],
            ['letter' => 'ب', 'unicode_hex' => '0628', 'windows_hex' => '0x0628', 'windows_decimal' => 1576, 'unicode_decimal' => 1576],
            ['letter' => 'ت', 'unicode_hex' => '062A', 'windows_hex' => '0x062A', 'windows_decimal' => 1578, 'unicode_decimal' => 1578],
            ['letter' => 'ث', 'unicode_hex' => '062B', 'windows_hex' => '0x062B', 'windows_decimal' => 1579, 'unicode_decimal' => 1579],
            ['letter' => 'ج', 'unicode_hex' => '062C', 'windows_hex' => '0x062C', 'windows_decimal' => 1580, 'unicode_decimal' => 1580],
            ['letter' => 'ح', 'unicode_hex' => '062D', 'windows_hex' => '0x062D', 'windows_decimal' => 1581, 'unicode_decimal' => 1581],
            ['letter' => 'خ', 'unicode_hex' => '062E', 'windows_hex' => '0x062E', 'windows_decimal' => 1582, 'unicode_decimal' => 1582],
            ['letter' => 'د', 'unicode_hex' => '062F', 'windows_hex' => '0x062F', 'windows_decimal' => 1583, 'unicode_decimal' => 1583],
            ['letter' => 'ذ', 'unicode_hex' => '0630', 'windows_hex' => '0x0630', 'windows_decimal' => 1584, 'unicode_decimal' => 1584],
            ['letter' => 'ر', 'unicode_hex' => '0631', 'windows_hex' => '0x0631', 'windows_decimal' => 1585, 'unicode_decimal' => 1585],
            ['letter' => 'ز', 'unicode_hex' => '0632', 'windows_hex' => '0x0632', 'windows_decimal' => 1586, 'unicode_decimal' => 1586],
            ['letter' => 'س', 'unicode_hex' => '0633', 'windows_hex' => '0x0633', 'windows_decimal' => 1587, 'unicode_decimal' => 1587],
            ['letter' => 'ش', 'unicode_hex' => '0634', 'windows_hex' => '0x0634', 'windows_decimal' => 1588, 'unicode_decimal' => 1588],
            ['letter' => 'ص', 'unicode_hex' => '0635', 'windows_hex' => '0x0635', 'windows_decimal' => 1589, 'unicode_decimal' => 1589],
            ['letter' => 'ض', 'unicode_hex' => '0636', 'windows_hex' => '0x0636', 'windows_decimal' => 1590, 'unicode_decimal' => 1590],
            ['letter' => 'ط', 'unicode_hex' => '0637', 'windows_hex' => '0x0637', 'windows_decimal' => 1591, 'unicode_decimal' => 1591],
            ['letter' => 'ظ', 'unicode_hex' => '0638', 'windows_hex' => '0x0638', 'windows_decimal' => 1592, 'unicode_decimal' => 1592],
            ['letter' => 'ع', 'unicode_hex' => '0639', 'windows_hex' => '0x0639', 'windows_decimal' => 1593, 'unicode_decimal' => 1593],
            ['letter' => 'غ', 'unicode_hex' => '063A', 'windows_hex' => '0x063A', 'windows_decimal' => 1594, 'unicode_decimal' => 1594],
            ['letter' => 'ف', 'unicode_hex' => '0641', 'windows_hex' => '0x0641', 'windows_decimal' => 1601, 'unicode_decimal' => 1601],
            ['letter' => 'ق', 'unicode_hex' => '0642', 'windows_hex' => '0x0642', 'windows_decimal' => 1602, 'unicode_decimal' => 1602],
            ['letter' => 'ك', 'unicode_hex' => '0643', 'windows_hex' => '0x0643', 'windows_decimal' => 1603, 'unicode_decimal' => 1603],
            ['letter' => 'ل', 'unicode_hex' => '0644', 'windows_hex' => '0x0644', 'windows_decimal' => 1604, 'unicode_decimal' => 1604],
            ['letter' => 'م', 'unicode_hex' => '0645', 'windows_hex' => '0x0645', 'windows_decimal' => 1605, 'unicode_decimal' => 1605],
            ['letter' => 'ن', 'unicode_hex' => '0646', 'windows_hex' => '0x0646', 'windows_decimal' => 1606, 'unicode_decimal' => 1606],
            ['letter' => 'ه', 'unicode_hex' => '0647', 'windows_hex' => '0x0647', 'windows_decimal' => 1607, 'unicode_decimal' => 1607],
            ['letter' => 'و', 'unicode_hex' => '0648', 'windows_hex' => '0x0648', 'windows_decimal' => 1608, 'unicode_decimal' => 1608],
            ['letter' => 'ي', 'unicode_hex' => '064A', 'windows_hex' => '0x064A', 'windows_decimal' => 1609, 'unicode_decimal' => 1609],
            ['letter' => 'ء', 'unicode_hex' => '0621', 'windows_hex' => '0x0621', 'windows_decimal' => 1577, 'unicode_decimal' => 1577],

          
            
        ];

        DB::table('arabic_letters')->insert($letters);
    }
}
