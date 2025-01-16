<?php

namespace App\Console\Commands;

use App\Http\Controllers\ArabicThreeLetterCombinationController;
use Illuminate\Console\Command;
use App\Models\ArabicLetter; // Assuming you have an ArabicLetter model to fetch letters from the database
use App\Models\ArabicThreeLetterCombination; // Model for the combinations table

class GenerateArabicThreeLetterCombinations extends Command
{
    protected $signature = 'generate:three-letter-combinations';
    protected $description = 'Generate all 3-letter combinations of Arabic letters and insert them into the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Fetch all Arabic letters from the database
        $letters = ArabicLetter::pluck('letter')->toArray();

        // Generate all 3-letter combinations
        $combinations = [];
        foreach ($letters as $letter1) {
            foreach ($letters as $letter2) {
                foreach ($letters as $letter3) {
                    $combinations[] = $letter1 . $letter2 . $letter3;
                }
            }
        }

        // Insert all combinations into the database
        foreach ($combinations as $combination) {
            ArabicThreeLetterCombination::create(['combination' => $combination]);
        }

        $this->info('3-letter combinations have been generated and inserted into the database.');
    }
}
