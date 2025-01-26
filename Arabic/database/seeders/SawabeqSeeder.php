<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SawabeqSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'من', 'type' => 'حرف جر'],
            ['name' => 'إلى', 'type' => 'حرف جر'],
            ['name' => 'عن', 'type' => 'حرف جر'],
            ['name' => 'على', 'type' => 'حرف جر'],
            ['name' => 'في', 'type' => 'حرف جر'],
            ['name' => 'لا', 'type' => 'أداة نفي'],
            ['name' => 'لم', 'type' => 'أداة نفي'],
            ['name' => 'لن', 'type' => 'أداة نفي'],
            ['name' => 'هل', 'type' => 'أداة استفهام'],
            ['name' => 'أ', 'type' => 'أداة استفهام'],
            ['name' => 'ن', 'type' => 'حروف مضارعة'],
            ['name' => 'ت', 'type' => 'حروف مضارعة'],
            ['name' => 'ي', 'type' => 'حروف مضارعة'],
        ];

        DB::table('sawabeqs')->insert($data);
    }
}
