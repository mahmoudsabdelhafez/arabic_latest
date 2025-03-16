<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RootsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roots')->insert([
            ['root' => 'فَعَلَ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['root' => 'فَعُلَ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['root' => 'فَعِلَ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
