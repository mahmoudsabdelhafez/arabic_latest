<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConnectiveCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the categories with their Arabic names
        $categories = [
            ['name' => 'Conjunctions', 'arabic_name' => 'أدوات العطف'],
            ['name' => 'Prepositions', 'arabic_name' => 'حروف الجر'],
            ['name' => 'ConditionalParticles', 'arabic_name' => 'أدوات الشرط'],
            ['name' => 'CausalParticles', 'arabic_name' => 'أدوات التعليل'],
            ['name' => 'ExceptiveParticles', 'arabic_name' => 'أدوات الاستثناء'],
            ['name' => 'RelativePronouns', 'arabic_name' => 'الأسماء الموصولة'],
            ['name' => 'DemonstrativePronouns', 'arabic_name' => 'أسماء الإشارة'],
            ['name' => 'Pronouns', 'arabic_name' => 'الضمائر'],
            ['name' => 'ParticlesOfExplanation', 'arabic_name' => 'أدوات التفسير'],
            ['name' => 'ParticlesOfResult', 'arabic_name' => 'أدوات النتيجة'],
            ['name' => 'ParticlesOfPurposeReason', 'arabic_name' => 'أدوات الغرض والسبب'],
            ['name' => 'AdverbsOfTimePlace', 'arabic_name' => 'ظروف الزمان والمكان'],
            ['name' => 'InterrogativeParticles', 'arabic_name' => 'أدوات الاستفهام'],
            ['name' => 'VocativeParticle', 'arabic_name' => 'أداة النداء'],
            ['name' => 'WordsOfContrast', 'arabic_name' => 'كلمات التضاد'],
        ];

        // Insert categories into the database
        foreach ($categories as $category) {
            DB::table('connective_categories')->updateOrInsert(
                ['name' => $category['name']],
                ['arabic_name' => $category['arabic_name'], 'created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
