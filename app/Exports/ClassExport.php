<?php

namespace App\Exports;

use App\Models\Classes;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClassExport implements  WithHeadings, WithMapping, FromQuery
{

    public function query()
    {
        return Classes::query();
    }
    public function headings(): array
    {
        return [
            'classid',
            'classname',

        ];
    }

    public function map($row): array
    {
        return [
            $row->classid,
            $row->classname,

        ];
    }
}
