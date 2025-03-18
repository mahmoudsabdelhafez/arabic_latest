<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HarakatFunctionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('harakat_functions')->insert([
            [
                'haraka_id' => 1, // Assuming haraka_id refers to a row in the 'harakats' table
                'grammatical_function' => 'توضّح موقع الكلمة في الجملة ووظيفتها النحوية وفق الإعراب ، وتوضّح  العلاقة النحوية بين الكلمات في الجملة وفق قواعد الإعراب.',
                'morphological_function' => 'الفتحة هي بعض الألف تؤثر في بنية الكلمة الصرفية وتغير شكلها الصرفي وتساعد في تصريفها وفق القواعد الصرفية.
و تشير إلى وزن  الفعل الثلاثي والرباعي في الزمن الماضي وتؤثر على دلالته النحوية.',
                'is_deletes' => false,
                'edit_by' => 2, // Assuming the user ID is 1
            ],
            [
                'haraka_id' => 2, // Assuming haraka_id refers to a row in the 'harakats' table
                'grammatical_function' => 'توضّح موقع الكلمة في الجملة ووظيفتها النحوية وفق الإعراب (ا فتكون علامة نصب  دائما ، وعلامةَ جَرٍّ في موضِعٍ واحِدٍ، وهو الممنوعُ مِنَ الصَّرفِ ،وتوضّح  العلاقة النحوية بين الكلمات في الجملة وفق قواعد الإعراب.',
                'morphological_function' => 'تؤثر في بنية الكلمة الصرفية وتغير شكلها الصرفي وتساعد في تصريفها وفق القواعد الصرفية.من خلال  اشتقاق الكلمات وتحديد الأوزان الصرفية مثل التصغير والإعلال والإبدال.',
                'is_deletes' => false,
                'edit_by' => 2, // Assuming the user ID is 1
            ],
            [
                'haraka_id' => 3, // Assuming haraka_id refers to a row in the 'harakats' table
                'grammatical_function' => 'توضّح موقع الكلمة في الجملة ووظيفتها النحوية وفق الإعراب (ا فتكون علامة جر  للأسماء .
وعلامةَ جَرٍّ في موضِعٍ واحِدٍ، وهو جمع المؤنث السالم .',
                'morphological_function' => 'تؤثر في بنية الكلمة الصرفية وتغير شكلها الصرفي وتساعد في تصريفها وفق القواعد الصرفية.
من خلال  اشتقاق الكلمات وتحديد الأوزان الصرفية مثل التصغير والإعلال والإبدال.',
                'is_deletes' => false,
                'edit_by' => 2, // Assuming the user ID is 1
            ],
            [
                'haraka_id' => 4, // Assuming haraka_id refers to a row in the 'harakats' table
                'grammatical_function' => '',
                'morphological_function' => 'حالة نطقية خالية من الحركات الثلاث ،وهو أشبه ما يكون بالوقف و قطع النفس عند التلفّظ بالصوامت ( تَقْييدَ الحَرْفِ وانْقِطاعَه عنِ الحَرَكةِ ).',
                'is_deletes' => false,
                'edit_by' => 2, // Assuming the user ID is 1
            ],
        ]);
    }
}
