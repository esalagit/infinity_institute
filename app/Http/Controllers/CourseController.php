<?php

namespace App\Http\Controllers;


use App\Exports\CourseExport;
use App\Imports\CourseImport;
use App\Models\Course;

use App\Models\Subject;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;









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


    public function importExcel(Request $request)
    {

        Excel::import(new CourseImport(), $request->file('excel'));
        return redirect()->route('course.courselistview');

    }

    public function exportExcel(Request $request)
    {
        $search = $request->get('search');
        return Excel::download(new CourseExport($search), 'course.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $search = $request->get('search');

        $courses = Course::with('subjectview')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('courseid', 'like', "%{$search}%")
                        ->orWhere('coursename', 'like', "%{$search}%")
                        ->orWhereHas('subjectview', function ($sq) use ($search) {
                            $sq->where('subjectname', 'like', "%{$search}%");
                        });
                });
            })
            ->get();

        $pdf = Pdf::loadView('course_list_pdf', compact('courses'));

        return $pdf->download('courses.pdf');
    }




}
