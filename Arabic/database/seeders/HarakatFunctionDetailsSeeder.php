<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HarakatFunctionDetailsSeeder extends Seeder
{
    public function run()
    {
        DB::table('harakat_function_details')->insert([
            [
                'harakat_function_id' => 3,
                'function_type' => 'morphological',
                'function' => 'من خلال  اشتقاق الكلمات وتحديد الأوزان الصرفية مثل التصغير والإعلال والإبدال.',
                'description' => 'من خلال  اشتقاق الكلمات وتحديد الأوزان الصرفية مثل التصغير والإعلال والإبدال.',
                'example' => 'باعَ -  بفتح الفاء		بيعَ -  بكسر لفاء ',
                'edit_by' => 3, // Assuming the user ID is 3
            ],
            [
                'harakat_function_id' => 3,
                'function_type' => 'morphological',
                'function' => ' وتؤثر على دلالةا لأسماء الصّرفية والنحوية والدلالية.',
                'description' => '  وتؤثر على دلالةا لأسماء الصّرفية والنحوية والدلالية.',
                'example' => 'مستخرَج - بفتح العين	اسم مفعول	مستخرّج -  بكسر العين	اسم فاعل',
                'edit_by' => 3,
            ],
            [
                'harakat_function_id' => 3,
                'function_type' => 'morphological',
                'function' => 'تدخل الكسرة  في الميزان الصرفي لأبواب الفعل الثلاثي والمصادر المشتقة  .  ',
                'description' => 'تدخل الكسرة  في الميزان الصرفي لأبواب الفعل الثلاثي والمصادر المشتقة  . ',
                'example' => 'فَعِل -  بكسر العين  - فِعال - بكسر الفاء',
                'edit_by' => 3,
            ],
            [
                'harakat_function_id' => 3,
                'function_type' => 'morphological',
                'function' => 'تظهر الكسرة في التصغير  والجموع.',
                'description' => 'تظهر الكسرة في التصغير  والجموع.',
                'example' => 'فعّيعِل - عُنيدِل		فُعيْعيل  - عنيدِيل',
                'edit_by' => 3,
            ],
            [
                'harakat_function_id' => 3,
                'function_type' => 'grammatical',
                'function' => 'علامة جر الأسماء المفردة',
                'description' => 'علامة جر الأسماء المفردة',
                'example' => 'مررت بالطالبِ',
                'edit_by' => 3,
            ],
            [
                'harakat_function_id' => 3,
                'function_type' => 'grammatical',
                'function' => 'علامة جر لجمع التكسير',
                'description' => 'علامة جر لجمع التكسير',
                'example' => '',
                'edit_by' => 3,
            ],
            [
                'harakat_function_id' => 3,
                'function_type' => 'grammatical',
                'function' => ' عَلامة نصب لجَمْعِ المُؤنَّثِ السَّالِمِ .',
                'description' => ' عَلامة نصب لجَمْعِ المُؤنَّثِ السَّالِمِ .',
                'example' => 'رأيتُ الطاالباتِ',
                'edit_by' => 3,
            ],
            [
                'harakat_function_id' => 3,
                'function_type' => 'grammatical',
                'function' => 'علامة جر لجمع المؤنث السالم ',
                'description' => 'علامة جر لجمع المؤنث السالم ',
                'example' => 'مررتُ بالمعلماتِ',
                'edit_by' => 3,
            ],
        ]);
    }
}
