<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LawaheqSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'ون', 'type' => 'علامة جمع'],
            ['name' => 'ين', 'type' => 'علامة تثنية'],
            ['name' => 'ة', 'type' => 'علامة تأنيث'],
            ['name' => 'ان', 'type' => 'علامة تثنية'],
            ['name' => 'ات', 'type' => 'علامة جمع مؤنث'],
            ['name' => 'وا', 'type' => 'علامة جمع'],
            ['name' => 'ى', 'type' => 'علامة تأنيث'],
            ['name' => 'ه', 'type' => 'ضمير متصل'],
            ['name' => 'ك', 'type' => 'ضمير متصل'],
            ['name' => 'نا', 'type' => 'ضمير متصل'],
        ];

        DB::table('lawaheqs')->insert($data);
    }
}
