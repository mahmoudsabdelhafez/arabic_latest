<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArabicLetter;
use App\Models\ArabicLetterAdjective;

class ArabicLetterAdjectiveSeeder extends Seeder
{
    public function run(): void
    {
        // The letters from "فحثه شخص سكت"
        $letters = ['ف', 'ح', 'ث', 'ه', 'ش', 'خ', 'ص', 'س', 'ك', 'ت'];

        // Retrieve letter IDs from the arabic_letters table
        $letterIds = ArabicLetter::whereIn('letter', $letters)->pluck('id')->toArray();

        // Insert adjectives using IDs
        foreach ($letterIds as $letterId) {
            ArabicLetterAdjective::create([
                'category_id' => 81,
                'arabic_letter_id' => $letterId,
            ]);
        }
    }
}
