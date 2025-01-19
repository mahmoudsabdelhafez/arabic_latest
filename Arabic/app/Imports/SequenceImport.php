<?php

namespace App\Imports;

use App\Models\Sequence;
use Maatwebsite\Excel\Concerns\ToModel;

class SequenceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sequence([
            'sequence' => $row[0],  // Assuming the sequence is in the first column of your Excel file
        ]);
    }
}
