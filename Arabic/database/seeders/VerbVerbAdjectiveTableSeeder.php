<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerbVerbAdjectiveTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('verb_verb_adjective')->insert([
            [
                'verb_id' => 1, // replace with actual verb id
                'verb_adjective_id' => 1, // Hasi
            ],
            [
                'verb_id' => 2, // replace with actual verb id
                'verb_adjective_id' => 2, // Ma'nawi
            ],
            [
                'verb_id' => 3, // replace with actual verb id
                'verb_adjective_id' => 3, // Majazi
            ],
            [
                'verb_id' => 4, // replace with actual verb id
                'verb_adjective_id' => 4, // Haqiqi
            ],
            [
                'verb_id' => 5, // replace with actual verb id
                'verb_adjective_id' => 5, // Le Makaan
            ],
        ]);
    }
}
