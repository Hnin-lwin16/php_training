<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }
    
    public function model(array $row)
    {
        return new Student([
            'name'     => $row[1], 
            'location' => $row[2],
            'created_at' => $row[3],
            'updated_at' => $row[4],
            'major_id' => $row[5]
        ]);
    }
}
