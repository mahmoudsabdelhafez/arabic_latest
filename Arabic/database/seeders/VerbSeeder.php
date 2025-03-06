<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerbSeeder extends Seeder
{
    public function run()
    {
        // Ensure the verb_types table has data before inserting verbs
        $verbTypes = DB::table('verb_types')->pluck('id', 'arabic_name');

        DB::table('verbs')->insert([
            [
                'verb' => 'جلس',
                'type_id' => $verbTypes['لازم'] ?? 1,
                'has_block' => false,
                'has_place' => true,
                'has_tool_name' => false,
                'perception' => 'حسي',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'verb' => 'كتب',
                'type_id' => $verbTypes['متعدي'] ?? 2,
                'has_block' => true,
                'has_place' => false,
                'has_tool_name' => true,
                'perception' => 'حسي',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
