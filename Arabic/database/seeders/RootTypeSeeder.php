<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RootTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('root_types')->insert([
            [
                'type_name' => 'جذر',
                'description' => 'الجذر هو الأساس الذي يُبنى عليه الكلمة في اللغة العربية.',
                'parent_id' => null, // Root type, no parent
                'table_name' => 'roots',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'فعل',
                'description' => 'الفعل هو الكلمة التي تدل على حدث أو عملية مرتبطة بزمن.',
                'parent_id' => 1, // Root type, no parent
                'table_name' => 'verbs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'اسم',
                'description' => 'الاسم هو الكلمة التي تدل على شيء معين، كإنسان، مكان، أو شيء.',
                'parent_id' => 1, // Root type, no parent
                'table_name' => 'nouns',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
