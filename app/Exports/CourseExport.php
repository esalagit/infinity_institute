<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CourseExport implements WithHeadings, WithMapping, FromQuery
{
    protected $search;

    public function __construct($search = null)
    {
        $this->search = $search;
    }

    public function query()
    {
        $query = Course::query();

        if ($this->search) {
            $query->where('courseid', 'like', '%' . $this->search . '%')
                ->orWhere('coursename', 'like', '%' . $this->search . '%')
                ->orWhere('subject_id', 'like', '%' . $this->search . '%');
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'courseid',
            'coursename',
            'subject_id',
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
