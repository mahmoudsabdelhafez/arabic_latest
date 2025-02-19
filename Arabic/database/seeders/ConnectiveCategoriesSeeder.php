<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConnectiveCategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Conjunctions',
            'Prepositions',
            'ConditionalParticles',
            'CausalParticles',
            'ExceptiveParticles',
            'RelativePronouns',
            'DemonstrativePronouns',
            'Pronouns',
            'ParticlesOfExplanation',
            'ParticlesOfResult',
            'ParticlesOfPurposeReason',
            'AdverbsOfTimePlace',
            'InterrogativeParticles',
            'VocativeParticle',
            'WordsOfContrast'
        ];

        foreach ($categories as $category) {
            DB::table('connective_categories')->insert([
                'name' => $category,
                'arabic_name' => $category,
            ]);
}
}
}