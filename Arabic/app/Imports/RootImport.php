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
            'root' => $row[0] ?? 'Unknown', // Assuming 'root' is in the first column
        ], [
            'type_id' => 1, // Assuming 'type_id' is in the second column
            'sensual_moral_type_id' => 1, // Assuming 'sensual_moral_type_id' is in the third column
            'example' => $row[1] ?? '', // Assuming 'example' is in the fourth column
            'notes' =>  null, // Assuming 'notes' is in the fifth column
        ]);

        // // Create the word entry and link it with the root
        // Word::firstOrCreate([
        //     'root_id' => $rootWord->id,
        //     'word' => $row[5] ?? 'Unknown Word',           // Assuming 'word' is in the sixth column
        //     'unvowelword' => $row[6] ?? 'Unknown Word',    // Assuming 'unvowelword' is in the seventh column
        //     'nonormstem' => $row[7] ?? 'Unknown Word',     // Assuming 'nonormstem' is in the eighth column
        // ]);

        return null; // We don't need to return anything
    }
}
