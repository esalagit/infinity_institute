<?php

namespace App\Http\Controllers;



use App\Models\Student;
use App\Models\Subject;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use Barryvdh\DomPDF\Facade\Pdf;


class StudentController extends Controller
{



    public function studentformview(){

  $subjects = Subject::all();
        return view('studentregiform',compact('subjects'));
    }

    public function studentlistview(){
//        $students = Student::all();
        $students = Student::with('subject')->get();
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
                'subject_id' => 'required|exists:subjects,id',
                'nicf'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'nicb'      => 'required|image|mimes:jpg,jpeg,png|max:2048',



                'password'  => 'required|string|min:2',
            ]);

            $imagePath1 = ImageUpload::uploadImage($request->file('nicf'), 'Student/NICF');
            $imagePath2 = ImageUpload::uploadImage($request->file('nicb'), 'Student/NICB');

            $student=Student::create([
                'sid'       => $validated['sid'],
                'name'      => $validated['name'],
                'address'   => $validated['address'],
                'email'     => $validated['email'],
                'phone1'    => $validated['phone1'],
                'phone2'    => $validated['phone2'],
                'nicf'      => $imagePath1,
                'nicb'      => $imagePath2,
                'pphone'    => $validated['pphone'],
                'subject_id'   => $validated['subject_id'],
                'password'  => Hash::make($validated['password']),
            ]);

            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => 'student',
                'related_id' => $student->id,
            ]);

            return redirect()->route('student.studentlistview');

        } catch (\Exception $e) {
            return $e;
        }
    }



    public function edit($id)
    {
        $students=Student::query()->where('id',$id)->first();

        $subjects = Subject::all();

        return view('studentupdate',compact('students','subjects'));

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
                'subject_id'   => 'required|exists:subjects,id',

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
                'subject_id'   => $validated['subject_id'],
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




public function importExcel(Request $request)
    {

        Excel::import(new StudentsImport, $request->file('excel'));
        return redirect()->route('student.studentlistview');

    }


    public function exportExcel(Request $request)
    {
        $search = $request->get('search');
       return Excel::download(new StudentsExport($search), 'students.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $search = $request->get('search');

        $students = Student::with('subject')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('sid', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone1', 'like', "%{$search}%")
                        ->orWhere('phone2', 'like', "%{$search}%")
                        ->orWhere('pphone', 'like', "%{$search}%");
                });
            })
            ->get();

        $pdf = Pdf::loadView('student_list_pdf', compact('students'));

        return $pdf->download('students.pdf');
    }



}
