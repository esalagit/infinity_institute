<?php

namespace App\Exports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SubjectExport implements WithHeadings, WithMapping, FromQuery
{
    protected $search;

    public function __construct($search = null)
    {
        $this->search = $search;
    }

    public function query()
    {
        $query = Subject::query();

        if ($this->search) {
            $query->where('subjectid', 'like', '%' . $this->search . '%')
                ->orWhere('subjectname', 'like', '%' . $this->search . '%')
                ->orWhere('teacher_id', 'like', '%' . $this->search . '%');
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'subjectid',
            'subjectname',
            'teacher_id',
        ];
    }

    public function map($row): array
    {
        return [
            $row->subjectid,
            $row->subjectname,
            $row->teacher_id,
        ];
    }
}
