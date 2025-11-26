<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacherformview(){
        return view('teacherregiform');
    }

    public function teacherlistview(){
        $teachers = Teacher::all();
        return view ('teacher_list',compact ('teachers'));
    }



    public function store(Request $request)
    {

        try {
            Teacher::query()->create([
                'tid' => $request->tid,
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'course1' => $request->course1,
                'course2' => $request->course2,
                'subject1'=> $request->subject1,
                'subject2'=> $request->subject2,
                'subject3'=> $request->subject3,
                'grade' => $request->grade,
                'class' => $request->class
            ]);
            return redirect()->route('teacher.teacherlistview');

        } catch (\Exception $e) {
            return $e;
        }
    }

    public function edit($id){
        $teacher = Teacher::query()
            ->where('id',$id)
            ->first();
        return view('teacherupdateform',compact('teacher'));
    }


    public function update(Request $request)
    {

        try {
            Teacher::query()->where('id',$request->id)
            ->update([
                'tid' => $request->tid,
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'course1' => $request->course1,
                'course2' => $request->course2,
                'subject1'=> $request->subject1,
                'subject2'=> $request->subject2,
                'subject3'=> $request->subject3,
                'grade' => $request->grade,
                'class' => $request->class
            ]);
            return redirect()->route('teacher.teacherlistview');

        } catch (\Exception $e) {
            return $e;
        }
    }
public function delete($id){

        try{

          Teacher::query()
          ->where('id',$id)
          ->delete();
         return redirect()->route('teacher.teacherlistview');
        }catch(\Exception $e){
            return $e;
        }

}
}
