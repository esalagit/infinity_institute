<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements WithHeadings, WithMapping, FromQuery
{
    public function query()
    {
        return Student::query();
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
