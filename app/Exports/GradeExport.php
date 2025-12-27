<?php

namespace App\Exports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GradeExport implements  WithHeadings, WithMapping, FromQuery
{

    protected $search;

    public function __construct($search = null)
    {
        $this->search = $search;
    }

    public function query()
    {
       $query=Grade::query();

        if ($this->search) {
            $query->where('gradeid', 'like', '%' . $this->search . '%')
                ->orWhere('gradename', 'like', '%' . $this->search . '%')
                ->orWhere('class_id', 'like', '%' . $this->search . '%');
        }
        return $query;
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
