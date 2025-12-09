<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{


    public function welcome_view(){
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

            $imagePath1 = ImageUpload::uploadImage($request->file('nicf'),'Student/NICF');
            $imagePath2 = ImageUpload::uploadImage($request->file('nicb'),'Student/NICB');


            Student::query()->create([
                'sid' => $request->sid,
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'nicf' => $imagePath1,
                'nicb' => $imagePath2,
                'pphone' => $request->pphone,
                'course' => $request->course,
                'grade' => $request->grade,
                'class' => $request->class,
                'password'=>Hash::make($request->password)
            ]);
            return redirect()->route('student.studentlistview');

        }
        catch (\Exception $e) {
            return $e;
        }
    }


    public function edit($id)
    {
        $student=Student::query()->where('id',$id)->first();
        return view('studentupdate',compact('student'));

    }



    public function update(Request $request)
    {

        try {
            Student::query()->where('id',$request->id)
                   ->update


            ([
                       'sid' => $request->sid,
                       'name' => $request->name,
                       'address' => $request->address,
                       'email' => $request->email,
                       'phone1' => $request->phone1,
                       'phone2' => $request->phone2,
                       'pphone' => $request->pphone,
                       'course' => $request->course,
                       'grade' => $request->grade,
                       'class' => $request->class,
                       'password'=>Hash::make($request->password)
            ]);
            return redirect()->route('student.studentlistview');

        } catch (\Exception $e) {
            return $e;
        }
    }

    public function delete($id){
        try {

            Student::query()
                ->where('id',$id)
                ->delete();
            return redirect()->route('student.studentlistview');
        }catch (\Exception $e){
            return $e;
        }
    }

    public function student_image_view(){

        try{

          $students = Student::all();

          return view('studentview',compact('students'));


        }

        catch (\Exception $e){
            return $e;
        }
    }

}
