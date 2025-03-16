<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerbAdjectivesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('verb_adjectives')->insert([
            [
                'arabic_name' => 'حسي',
                'description' => 'يشير إلى الأفعال المتعلقة بالحواس أو ما يمكن إدراكه بالحواس.',
                'example' => 'شعرت بالحرارة.',
                'notes' => '',
            ],
            [
                'arabic_name' => 'معنوي',
                'description' => 'يشير إلى الأفعال التي تتعلق بالمعاني أو الحالات النفسية والفكرية.',
                'example' => 'شعرت بالفرح.',
                'notes' => '',
            ],
            [
                'arabic_name' => 'مجازي',
                'description' => 'يشير إلى الأفعال التي تُستخدم في سياقات غير حرفية أو ضمن مجاز.',
                'example' => 'رأيت الحياة تمر أمام عيني.',
                'notes' => '',
            ],
            [
                'arabic_name' => 'حقيقي',
                'description' => 'يشير إلى الأفعال التي تشير إلى الواقع أو الحقيقة دون تجميل أو تشويه.',
                'example' => 'أخذت الكتاب.',
                'notes' => '',
            ],
            [
                'arabic_name' => 'له مكان',
                'description' => 'يشير إلى الأفعال التي تتعلق بمكان محدد أو حيز مادي أو معنوي.',
                'example' => 'الكتاب على الطاولة.',
                'notes' => '',
            ],
        ]);
    }
}

