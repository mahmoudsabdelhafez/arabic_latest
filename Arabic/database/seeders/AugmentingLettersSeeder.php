<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AugmentingLettersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Augmenting letters with their corresponding arabic_letter_id
        $augmentingLetters = [
            [  'arabic_letter_id' => 12,'example'=>'س'],  // Update with correct arabic_letter_id
            [  'arabic_letter_id' => 1,'example'=>'ء'],  // Update with correct arabic_letter_id
            [  'arabic_letter_id' => 23,'example'=>'ل'],  // Update with correct arabic_letter_id
            [  'arabic_letter_id' => 3,'example'=>'ت'],  // Update with correct arabic_letter_id
            [  'arabic_letter_id' => 24,'example'=>'م'],  // Update with correct arabic_letter_id
            [  'arabic_letter_id' => 27,'example'=>'و'],  // Update with correct arabic_letter_id
            [  'arabic_letter_id' => 25,'example'=>'ن'],  // Update with correct arabic_letter_id
            [  'arabic_letter_id' => 28,'example'=>'ي'],  // Update with correct arabic_letter_id
            [  'arabic_letter_id' => 26,'example'=>'ه'],  // Update with correct arabic_letter_id
            [  'arabic_letter_id' => 29,'example'=>'ا'], // Update with correct arabic_letter_id
        ];

        // Insert data into augmenting_letters table
        DB::table('augmenting_letters')->insert($augmentingLetters);
    }
}
