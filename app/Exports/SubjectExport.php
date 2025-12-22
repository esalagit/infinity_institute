<?php

namespace App\Exports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SubjectExport implements  WithHeadings, WithMapping, FromQuery
{
    public function query()
    {
        return Subject::query();

    }
    public function headings(): array
    {
        return [
            'subjectid',
            'subjectname',
            'teacher_id'
        ];
    }
    public function map($row): array
    {
        return [
            $row->subjectid,
            $row->subjectname,
            $row->teacher_id

        ];
    }
}
