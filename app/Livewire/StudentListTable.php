<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\On;

class StudentListTable extends Component
{
    protected $listeners = ['refreshStudentTable'=>'$refresh'];




    public function render()
    {
        $students = Student::all();

        return view('livewire.student-list-table',compact('students'));
    }
}
