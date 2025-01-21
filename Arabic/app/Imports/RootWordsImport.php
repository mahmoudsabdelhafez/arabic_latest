<?php

namespace App\Imports;

use App\Models\RootWord;
use Maatwebsite\Excel\Concerns\ToModel;

class RootWordsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

     

        return new RootWord([
            'root' => $row[0],  // This corresponds to the 'root' column in the Excel file
        ]);
      
    }
}
