<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CourseExport implements  WithHeadings, WithMapping, FromQuery
{

    public function query()
    {
      return Course::query();
    }
    public function headings(): array
    {
        return [
        'courseid',
        'coursename',
        'subject_id'
        ];
    }

    public function map($row): array
    {
        return [
            $row->courseid,
            $row->coursename,
            $row->subject_id
        ];
    }
}
