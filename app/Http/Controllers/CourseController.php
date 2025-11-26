<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
   public function courseregiview(){
       return view('courseregiform');
   }

   public function store(Request $request){
       try {
           Course::query()->create([
               'courseid'=>$request-> courseid,
               'coursename'=>$request-> coursename,
               'ccode'=>$request-> ccode,


           ]);
           return redirect()->route('subject.subregiform');

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
       return view('courseupdateform',compact('course'));



    }

    public function update(Request $request){
        try {
            Course::query()
                ->where('id',$request->id)
                ->update([
                    'courseid'=>$request-> courseid,
                    'coursename'=>$request-> coursename,
                    'ccode'=>$request-> ccode,


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




}
