<?php

namespace App\Http\Controllers;


use App\Exports\CourseExport;
use App\Models\Course;

use App\Models\Subject;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class CourseController extends Controller
{
   public function courseregiview(){
       $subjects=Subject::all();
       return view('courseregiform',compact('subjects'));
   }

   public function store(Request $request){
       try {
           $validated = $request->validate([
               'courseid'   => 'required|string|max:255',
               'coursename' => 'required|string|max:255',
               'subject_id'  => 'required|exists:subjects,id',
           ]);
           Course::create([
               'courseid'   => $validated['courseid'],
               'coursename' => $validated['coursename'],
               'subject_id'  => $validated['subject_id'],
           ]);

           return redirect()->route('course.courselistview');

       }catch (\Exception $e){
           return $e;
       }
   }

    public function courselistview(){
       $courses = Course::all();
        return view('course_list', compact('courses'));
    }


    public function edit($id){

       $course = Course::query()
           ->where('id', $id)
           ->first();
        $subjects = Subject::all();
       return view('courseupdateform',compact('course','subjects'));



    }

    public function update(Request $request){
        try {
            $validated = $request->validate([
                'id'        => 'required|exists:courses,id',
                'courseid'   => 'required|string|max:255',
                'coursename' => 'required|string|max:255',
                'subject_id'  => 'required|exists:subjects,id',
            ]);

            Course::where('id', $validated['id'])->update([
                'courseid'   => $validated['courseid'],
                'coursename' => $validated['coursename'],
                'subject_id'  => $validated['subject_id'],
            ]);
            return redirect()->route('course.courselistview');

        }catch (\Exception $e){
            return $e;
        }
    }


    public function delete($id){

     try{
         Course::query()
             ->where('id',$id)
             ->delete();
         return redirect()->route('course.courselistview');
     } catch
     (\Exception $e){return $e;}
    }

public function export(){
       return Excel::download(new CourseExport(), 'courses.xlsx');

}

}
