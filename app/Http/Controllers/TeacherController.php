<?php

namespace App\Http\Controllers;

use App\Exports\TeacherExport;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    public function teacherformview(){
        $subjects = Subject::all();
        $grades = Grade::all();
        return view('teacherregiform',compact('subjects','grades'));
    }

    public function teacherlistview(){
       $teachers = Teacher::with('teachersubject')->get();
        $grades = Grade::all();
        return view ('teacher_list',compact ('teachers','grades'));
    }



    public function store(Request $request)
    {

        try {

            $validated = $request->validate([
                'tid'       => 'required|string|max:255',
                'teachername' => 'required|string|max:255',
                'address'   => 'required|string|max:255',
                'email'     => 'required|email|max:255',

                'phone1'    => 'required|digits_between:1,12',
                'phone2'    => 'nullable|digits_between:1,12',


                'nicf'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'nicb'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'grade_id'   => 'required|exists:grades,id',
                'subject_id' => 'required|exists:subjects,id',
                'password'  => 'required|string|min:2',

            ]);

            $imagePath1 = ImageUpload::uploadImage($request->file('nicf'), 'Teacher/NICF');
            $imagePath2 = ImageUpload::uploadImage($request->file('nicb'), 'Teacher/NICB');


            $teacher=Teacher::create([

                'tid'       => $validated['tid'],
                'teachername'       => $validated['teachername'],
                'address'       => $validated['address'],
                'email'       => $validated['email'],
                'phone1'       => $validated['phone1'],
                'phone2'       => $validated['phone2'],
                'nicf'      => $imagePath1,
                'nicb'      => $imagePath2,
                'grade_id'   => $validated['grade_id'],
                'subject_id'   => $validated['subject_id'],
                'password'  => Hash::make($validated['password']),

            ]);
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => 'teacher',
                'related_id' => $teacher->id,
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
        $subjects = Subject::all();
        $grades = Grade::all();
        return view('teacherupdateform',compact('teacher','subjects','grades'));
    }


    public function update(Request $request)
    {

        try {
            $validated = $request->validate([

                'tid'       => 'required|string|max:255',
                'teachername' => 'required|string|max:255',
                'address'   => 'required|string|max:255',
                'email'     => 'required|email|max:255',

                'phone1'    => 'required|digits_between:1,12',
                'phone2'    => 'nullable|digits_between:1,12',


                'nicf'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'nicb'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'grade_id'   => 'required|exists:grades,id',
                'subject_id' => 'required|exists:subjects,id',


            ]);

            $teacher = Teacher::findOrFail($request->id);

            if ($request->hasFile('nicf')) {
                $imagePath1 = ImageUpload::uploadImage($request->file('nicf'), 'Teacher/NICF');
            } else {
                $imagePath1 = $teacher->nicf;
            }


            if ($request->hasFile('nicb')) {
                $imagePath2 = ImageUpload::uploadImage($request->file('nicb'), 'Teacher/NICB');
            } else {
                $imagePath2 = $teacher->nicb;
            }


            $teacher->update([

                'tid'       => $validated['tid'],
                'teachername'       => $validated['teachername'],
                'address'      => $validated['address'],
                'email'       => $validated['email'],
                'phone1'    => $validated['phone1'],
                'phone2'    => $validated['phone2'],
                'nicf'      => $imagePath1,
                'nicb'      => $imagePath2,
                'grade_id'    => $validated['grade_id'],
                'subject_id'   => $validated['subject_id'],
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

public function export()
{
    return Excel::download(new TeacherExport,'teacher.xlsx');
}
}
