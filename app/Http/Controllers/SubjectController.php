<?php

namespace App\Http\Controllers;

use App\Exports\SubjectExport;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SubjectController extends Controller
{
    public function subjectregiview(){
        $teachers = Teacher::all();
        return view('subjectregiform',compact('teachers'));
    }

    public function subjectlistview(){

        $subjects = Subject::with('techname')->get();

        return view('subject_list',compact('subjects'));
    }



    public function store(Request $request)
    {
        try {
            $validated = $request->validate([

                'subjectid' => 'required|string|max:255',
                'subjectname' => 'required|string|max:255',
                'teacher_id' => 'required|exists:teachers,id',
            ]);
           Subject::create([
               'subjectid' => $validated['subjectid'],
               'subjectname' => $validated['subjectname'],
               'teacher_id' => $validated['teacher_id'],
           ]);



            return redirect()->route('subject.subjectlistview');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit($id){
        $subjects = Subject::query()
            ->where('id',$id)
            ->first();
        $teachers = Teacher::all();
        return view('subjectupdateform',compact('subjects','teachers'));

    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'id' => 'required|exists:subjects,id',
                'subjectid' => 'required|string|max:255',
                'subjectname' => 'required|string|max:255',
                'teacher_id' => 'required|exists:teachers,id',
            ]);
          Subject::where('id',$validated['id'])->update([
              'subjectid' => $validated['subjectid'],
              'subjectname' => $validated['subjectname'],
              'teacher_id' => $validated['teacher_id'],

          ]);




            return redirect()->route('subject.subjectlistview');
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function delete($id){
        try{
            Subject::query()
            ->where('id',$id)
            ->delete();
            return redirect()->route('subject.subjectlistview');
        }
        catch(\Exception $e){
            return $e;
        }
    }

    public function export(){
        return Excel::download(new SubjectExport,'subject.xlsx');
    }

}
