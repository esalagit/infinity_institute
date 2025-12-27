<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements WithHeadings, WithMapping, FromQuery
{


    protected $search;

    public function __construct($search = null)
    {
        $this->search = $search;
    }
    public function query()
    {
        $query= Student::query();

        if ($this->search) {

            $query->where('sid', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone1', 'like', '%' . $this->search . '%')
                ->orWhere('phone2', 'like', '%' . $this->search . '%')
                ->orWhere('pphone', 'like', '%' . $this->search . '%')
                ->orWhere('subject_id', 'like', '%' . $this->search . '%');


        }
        return $query;
    }

    public function headings(): array
    {
        return [
            'student_id',
            'name',
            'address',
            'email',
            'phone_no_1',
            'phone_no_2',
            'parent_phone',
            'subject_id',
        ];
    }

    public function map($row): array
    {
        return [
            $row->sid,
            $row->name,
            $row->address,
            $row->email,
            $row->phone1,
            $row->phone2,
            $row->pphone,
            $row->subject_id,
        ];
    }
}
