<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class StudentsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select(
            'sid',
            'name',
            'address',
            'email',
            'phone1',
            'phone2',
            'pphone',
            'course',
            'grade_id',
        )->get();
    }


    public function headings(): array
    {
        return [
            'Student ID',
            'Name',
            'Address',
            'Email',
            'Phone No 1',
            'Phone No 2',
            'Parent Phone No ',
            'Course',
            'Grade',

        ];
    }
}
