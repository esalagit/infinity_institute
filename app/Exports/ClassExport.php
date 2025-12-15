<?php

namespace App\Exports;

use App\Models\Classes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClassExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return Classes::select(
           'classid',
           'classname',

       )->get();
    }
    public function headings(): array
    {return [
        'Class ID',
        'Class Name',
    ];}
}
