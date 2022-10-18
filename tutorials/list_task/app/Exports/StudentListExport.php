<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentListExport implements FromCollection, WithHeadings
{   
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array{
        return[
            'ID',
            'Student Name',
            'Location',
            'created_at',
            'updated_at',
            'Major Id'
        ];
    }

    public function collection()
    {
       return Student::all();
    }
}
