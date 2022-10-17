<?php

namespace App\Exports;

use App\Models\Studend;
use Maatwebsite\Excel\Concerns\FromCollection;


class StudentListExport implements FromCollection
{   
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $export = Studend::all();
        return $export;
    }
}
