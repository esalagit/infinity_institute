<?php

namespace App\Http\Controllers;

use App\Exports\SubjectExport;
use App\Models\Subject;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SubjectController extends Controller
{
    public function subjectregiview(){
        return view('subjectregiform');
    }

    public function subjectlistview(){
        $subjects = Subject::all();
        return view('subject_list',compact('subjects'));
    }



    public function store(Request $request)
    {
        try {
            Subject::query()->create([

                'subjectid' => $request->subjectid,
                'subjectname' => $request->subjectname,


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
        return view('subjectupdateform',compact('subjects'));

    }

    public function update(Request $request)
    {
        try {
            Subject::query()
            ->where('id',$request->id)
            ->update([

                'subjectid' => $request->subjectid,
                'subjectname' => $request->subjectname,



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
