<?php

namespace App\Livewire;

use App\Http\Controllers\ImageUpload;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class StudentRegForm extends Component


{
    public $sid,$name,$address,$email,$phone1,$phone2,$nicf,$nicb,$pphone,$course,$grade,$password;



    public $classes;
    public $grades;
    public $courses;



    public function mount()
    {
        $this->classes = Classes::all();
        $this->grades = Grade::all();
        $this->courses = Course::all();
    }

    public function render()
    {

        return view('livewire.student-reg-form');
    }




    public function submit(){


        Student::query()->create([
            'sid' => $this->sid,
            'name' => $this->name,
            'address' => $this->address,
            'email' => $this->email,
            'phone1' => $this->phone1,
            'phone2' =>$this->phone2,
            'nicf' =>$this->nicf,
            'nicb' =>$this->nicb,
            'pphone' =>$this->pphone,
            'course' => $this->course,
            'grade' => $this->grade,
            'password'=>Hash::make($this->password)
        ]);
   $this->clear();
   $this->dispatch('refreshStudentTable');
//        $this->dispatch('refresh-student-table');



    }

public function clear(){
        $this->sid='';
        $this->name='';
        $this->address='';
        $this->email='';
        $this->phone1='';
        $this->phone2='';
        $this->nicf='';
        $this->nicb='';
        $this->pphone='';
        $this->course='';
        $this->grade='';
        $this->password='';
}



}
