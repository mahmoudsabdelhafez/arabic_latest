<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerbsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('verbs')->insert([
            ['verb' => 'كتب'],
            ['verb' => 'قرأ'],
            ['verb' => 'أكل'],
            ['verb' => 'شرب'],
            ['verb' => 'ذهب'],
        ]);
    }
}
