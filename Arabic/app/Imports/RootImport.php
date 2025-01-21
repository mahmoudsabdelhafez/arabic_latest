<?php

namespace App\Imports;

use App\Models\Root;
use App\Models\Word;
use Maatwebsite\Excel\Concerns\ToModel;

class RootImport implements ToModel
{
    /**
     * Handle the data for importing.
     * 
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Ensure root word is unique before inserting
        $rootWord = Root::firstOrCreate([
            'root' => $row[1] ?? 'Unknown', // Assuming 'root' is in the second column of your Excel
        ]);

        // Create the word entry and link it with the root
        $word = Word::firstOrCreate([
            'root_id' => $rootWord->id ?? 'Unknown root',
            'word' => $row[2] ?? 'Unknown Word',           // Assuming 'word' is in the third column of your Excel
            'unvowelword' => $row[3] ?? 'Unknown Word',    // Assuming 'unvowelword' is in the fourth column
            'nonormstem' => $row[4] ?? 'Unknown Word',     // Assuming 'nonormstem' is in the fifth column
        ]);

        // Manually associate the word with the root by setting the root_id foreign key
        // $word->root_id = $rootWord->id; // Set the root_id foreign key
        $word->save(); // Save the word

        return null; // We don't need to return the rootWord as it's already being handled
    }
}
