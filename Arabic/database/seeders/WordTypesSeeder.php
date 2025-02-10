<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordTypesSeeder extends Seeder
{
    public function run()
    {
        DB::table('word_types')->insert([
            [
                'type_name' => 'الاسم',
                'description' => 'هو الكلمة التي تدل على شيء معين دون أن ترتبط بزمن، مثل: الأشخاص، الأماكن، الأشياء، الصفات.'
            ],
            [
                'type_name' => 'الفعل',
                'description' => 'هو الكلمة التي تدل على حدث مقترن بزمن، وينقسم إلى الماضي، المضارع، والأمر.'
            ],
            [
                'type_name' => 'الحرف',
                'description' => 'هو الكلمة التي لا تدل على معنى وحدها، بل تكتسب معناها داخل الجملة.'
            ]
        ]);
    }
}
