<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

class ComparisonsSimilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comparisons_similes')->insert([
            [
                'name' => 'ك',
                'english_name' => 'k',
                'linking_tool_id' => 11,
                'grammatical_function' => 'تشبيه',
                'semantic_function' => 'القوة',
                'example' => 'كان الرجل شجاعًا كالأسد في المعركة.',
                'description' => 'تشبيه الرجل بالأسد للدلالة على الشجاعة.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
