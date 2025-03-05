<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArabicLetter;
use App\Models\ArabicLetterAdjective;

class ArabicLetterAdjectiveCategory203Seeder extends Seeder
{
    public function run(): void
    {
        // Letters from the given list
        $letters = ['ص', 'ض', 'ط', 'ظ'];

        // Get letter IDs from the arabic_letters table
        $letterIds = ArabicLetter::whereIn('letter', $letters)->pluck('id')->toArray();

        // Insert adjectives using IDs
        foreach ($letterIds as $letterId) {
            ArabicLetterAdjective::create([
                'category_id' => 203,
                'arabic_letter_id' => $letterId,
            ]);
        }
    }
}
