<?php

namespace App\Exports;

use App\Models\Classes;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClassExport implements  WithHeadings, WithMapping, FromQuery
{

    protected $search;

    public function __construct($search = null)
    {
        $this->search = $search;
    }


    public function query()
    {

        $query = Classes::query();

        if ($this->search) {
            $query->where('classid', 'like', '%' . $this->search . '%')
            ->orWhere('classname', 'like', '%' . $this->search . '%');
        }
        return $query;
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
