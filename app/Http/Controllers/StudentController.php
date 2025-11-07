<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    public function welcomeview(){
        return view('welcome');
    }
    public function studentformview(){
        return view('studentregiform');
    }

    public function studentlistview(){
         $students = Student::all();
        return view('student_list',compact('students'));
    }


    public function store(Request $request)
    {

        try {
            Student::query()->create([
                'reg_no' => $request->reg_no,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'class' => $request->class
            ]);
            return redirect()->route('student.studentlistview');

        } catch (\Exception $e) {
            return $e;
        }
    }

}
