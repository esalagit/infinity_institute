<?php

namespace App\Exports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GradeExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Grade::select(
        'gradeid',
        'gradename',
        'class_id'
        )->get();

    }

    public function headings(): array
    {return [
        'Grade Id',
        'Grade Name',
        'Class Name'
    ];

    }
}
