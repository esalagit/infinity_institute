<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CourseExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return Course::select(
           'courseid',
           'coursename',
           "subject_id"
       )->get();
    }
    public function headings(): array
    {return[
        'Course ID',
        'Course Name',
        'Subject ID'
    ];}
}
