<?php

namespace App\Imports;

use App\Models\Studend;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Studend([
            'name'     => $row[1],
            'major'    => $row[2], 
            'location' => $row[3],
            'created_at' => $row[4],
            'updated_at' => $row[5],
            'major_id' => $row[6]
        ]);
    }
}
