<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SpecificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specifications')->insert([
            [
                'name' => 'إلا',
                'english_name' => 'Except',
                'linking_tool_id' => 17,
                'grammatical_function' => 'وظيفة نحوية مثال',
                'semantic_function' => 'وظيفة دلالية مثال',
                'example' => 'هذا مثال لاستخدام الأداة.',
                'description' => 'هذا وصف للأداة المستخدمة.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'سوى',
                'english_name' => 'Except for',
                'linking_tool_id' => 17,
                'grammatical_function' => 'وظيفة نحوية أخرى',
                'semantic_function' => 'وظيفة دلالية أخرى',
                'example' => 'هنا مثال آخر لاستخدام الأداة.',
                'description' => 'وصف آخر للأداة.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
