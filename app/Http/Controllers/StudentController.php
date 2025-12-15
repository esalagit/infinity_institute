<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{


    public function welcome_view(){
        return view('welcome');
    }
    public function studentformview(){

//        $grades = Grade::all();
        $grades = Grade::with('classroom')->get();
        return view('studentregiform',compact('grades'));
    }

    public function studentlistview(){
        $students = Student::all();
        return view('student_list',compact('students'));
    }


    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'sid'       => 'required|string|max:255',
                'name'      => 'required|string|max:255',
                'address'   => 'required|string|max:255',
                'email'     => 'required|email|max:255',

                'phone1'    => 'required|digits_between:1,12',
                'phone2'    => 'nullable|digits_between:1,12',
                'pphone'    => 'required|digits_between:1,12',

                'nicf'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'nicb'      => 'required|image|mimes:jpg,jpeg,png|max:2048',

                'course'    => 'required|string|max:255',

                'grade_id'  => 'required|exists:grades,id',

                'password'  => 'required|string|min:2',
            ]);

            $imagePath1 = ImageUpload::uploadImage($request->file('nicf'), 'Student/NICF');
            $imagePath2 = ImageUpload::uploadImage($request->file('nicb'), 'Student/NICB');

            Student::create([
                'sid'       => $validated['sid'],
                'name'      => $validated['name'],
                'address'   => $validated['address'],
                'email'     => $validated['email'],
                'phone1'    => $validated['phone1'],
                'phone2'    => $validated['phone2'],
                'nicf'      => $imagePath1,
                'nicb'      => $imagePath2,
                'pphone'    => $validated['pphone'],
                'course'    => $validated['course'],
                'grade_id'  => $validated['grade_id'],
                'password'  => Hash::make($validated['password']),
            ]);

            return redirect()->route('student.studentlistview');

        } catch (\Exception $e) {
            return $e;
        }
    }



    public function edit($id)
    {
        $student=Student::query()->where('id',$id)->first();
        $grades = Grade::all();
        return view('studentupdate',compact('student','grades'));

    }



    public function update(Request $request)
    {
        try {

            $validated = $request->validate([
                'sid'       => 'required|string|max:255',
                'name'      => 'required|string|max:255',
                'address'   => 'required|string|max:255',
                'email'     => 'required|email|max:255',
                'phone1'    => 'required|digits_between:1,12',
                'phone2'    => 'nullable|digits_between:1,12',
                'pphone'    => 'required|digits_between:1,12',

                'nicf'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'nicb'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

                'course'    => 'required|string|max:255',
                'grade_id'  => 'required|exists:grades,id',
            ]);


            $student = Student::findOrFail($request->id);


            if ($request->hasFile('nicf')) {
                $imagePath1 = ImageUpload::uploadImage($request->file('nicf'), 'Student/NICF');
            } else {
                $imagePath1 = $student->nicf;
            }


            if ($request->hasFile('nicb')) {
                $imagePath2 = ImageUpload::uploadImage($request->file('nicb'), 'Student/NICB');
            } else {
                $imagePath2 = $student->nicb;
            }


            $student->update([
                'sid'       => $validated['sid'],
                'name'      => $validated['name'],
                'address'   => $validated['address'],
                'email'     => $validated['email'],
                'phone1'    => $validated['phone1'],
                'phone2'    => $validated['phone2'],
                'nicf'      => $imagePath1,
                'nicb'      => $imagePath2,
                'pphone'    => $validated['pphone'],
                'course'    => $validated['course'],
                'grade_id'  => $validated['grade_id'],
            ]);

            return redirect()->route('student.studentlistview');

        } catch (\Exception $e) {
            return $e->getMessage();
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

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

}
