<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TajweedCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tajweed_categories')->insert([
            ['name' => 'أحكام النون الساكنة والتنوين'],
            ['name' => 'أحكام الميم الساكنة'],
            ['name' => 'أحكام الإدغام'],
            ['name' => 'أحكام التفخيم والترقيق'],
            ['name' => 'أحكام المدود'],
        ]);
    }
}
