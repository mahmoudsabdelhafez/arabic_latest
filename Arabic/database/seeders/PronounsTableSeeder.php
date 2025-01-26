<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PronounsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // بيانات الضمائر العربية
        $pronouns = [
            ['pronoun' => 'أنا', 'definition' => 'ضمير المتكلم المفرد'],
            ['pronoun' => 'نحن', 'definition' => 'ضمير المتكلم الجمع'],
            ['pronoun' => 'أنتَ', 'definition' => 'ضمير المخاطب المفرد المذكر'],
            ['pronoun' => 'أنتِ', 'definition' => 'ضمير المخاطب المفرد المؤنث'],
            ['pronoun' => 'أنتما', 'definition' => 'ضمير المخاطب المثنى'],
            ['pronoun' => 'أنتم', 'definition' => 'ضمير المخاطب الجمع المذكر'],
            ['pronoun' => 'أنتن', 'definition' => 'ضمير المخاطب الجمع المؤنث'],
            ['pronoun' => 'هو', 'definition' => 'ضمير الغائب المفرد المذكر'],
            ['pronoun' => 'هي', 'definition' => 'ضمير الغائب المفرد المؤنث'],
            ['pronoun' => 'هما', 'definition' => 'ضمير الغائب المثنى'],
            ['pronoun' => 'هم', 'definition' => 'ضمير الغائب الجمع المذكر'],
            ['pronoun' => 'هن', 'definition' => 'ضمير الغائب الجمع المؤنث'],
        ];

        // إدراج البيانات في الجدول
        DB::table('pronouns')->insert($pronouns);
    }
}