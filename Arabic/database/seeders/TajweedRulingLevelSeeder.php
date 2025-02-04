<?php

namespace Database\Seeders;

use App\Models\TajweedRulingLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TajweedRulingLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['level_name' => 'التحقيق', 'description' => '. لغة: هو المبالغة في الإتيان بالشيء على حقيقته من غير زيادة فيه ولا نقص عنه، فهو بلوغ حقيقة الشيء والوقوف على كنهه، والوصول إلى نهاية شأنه. 
واصطلاحا: إعطاء الحروف حقها من إشباع المد وتحقيق الهمز وإتمام الحركات وتوفية الغنات وتفكيك الحروف وهو بيانها، وإخراج بعضها من بعض بالسكت والتؤدة، والوقف على الوقوف الجائزة والإتيان بالإظهار والإدغام على وجهه.'],
            ['level_name' => 'الحدر', 'description' => ' لغة: مصدر من حَدَرَ يُحدر إذا أسرع، أو هو من الحدر الذي هو الهبوط، لأن الإسراع من لازمه.
واصطلاحا: إدراج القراءة وسرعتها مع مراعاة أحكام التجويد من إظهار وإدغام وقصر ومد، ومخارج وصفات.'],
            ['level_name' => 'التدوير', 'description' => 'فهو عبارة عن التوسط بين مرتبتي التحقيق والحدر.'],
        ];

        foreach ($levels as $level) {
            TajweedRulingLevel::create($level);
        }
    }
}
