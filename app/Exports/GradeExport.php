<?php

namespace App\Exports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GradeExport implements  WithHeadings, WithMapping, FromQuery
{

    public function query()
    {
        return Grade::query();
    }
    public function headings(): array
    {
        return [
            'gradeid',
            'gradename',
            'class_id'
        ];
    }

    public function map($row): array
    {
        return [
            $row->gradeid,
            $row->gradename,
            $row->class_id
        ];
    }
}
