<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

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
                'ccode' => $request->ccode,
                'subid1' => $request->subid1,
                'subname1' => $request->subname1,
                'subid2' => $request->subid2,
                'subname2' => $request->subname2,
                'subid3' => $request->subid3,
                'subname3' => $request->subname3,
                'subid4' => $request->subid4,
                'subname4' => $request->subname4,


            ]);
            return redirect()->route('subject.subjectlistview');
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit($id){
        $subject = Subject::query()
            ->where('id',$id)
            ->first();
        return view('subjectupdateform',compact('subject'));

    }

    public function update(Request $request)
    {
        try {
            Subject::query()
            ->where('id',$request->id)
            ->update([
                'ccode' => $request->ccode,
                'subid1' => $request->subid1,
                'subname1' => $request->subname1,
                'subid2' => $request->subid2,
                'subname2' => $request->subname2,
                'subid3' => $request->subid3,
                'subname3' => $request->subname3,
                'subid4' => $request->subid4,
                'subname4' => $request->subname4,


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

}
