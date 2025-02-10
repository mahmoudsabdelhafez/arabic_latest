<?php

namespace Database\Seeders;

use App\Models\LanguageContent;
use Illuminate\Database\Seeder;

class LanguageContentSeeder extends Seeder
{
    public function run()
    {
        LanguageContent::create([
            'section' => 'اللغة العربية',
            'content' => 'اللغة العربية هي واحدة من أقدم وأغنى اللغات، وهي لغة القرآن الكريم، ويتحدث بها أكثر من 400 مليون شخص حول العالم. تمتاز بجمالها البلاغي وقواعدها الدقيقة.',
            'language' => 'arabic'
        ]);

        LanguageContent::create([
            'section' => 'أقسام الكلمة في اللغة العربية',
            'content' => 'تتكون الكلمات في اللغة العربية من ثلاثة أقسام رئيسية...',
            'language' => 'arabic'
        ]);
        
        // Add more sections as needed
    }
}
