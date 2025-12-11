<?php

namespace App\Http\Controllers;


use App\Models\Classes;


use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function classregiview(){
        return view('classregiform');
    }



    public function store(Request $request){
        try {
            Classes::query()->create([
                'classid'=>$request-> classid,
                'classname'=>$request-> classname,



            ]);
            return redirect()->route('class.classlistview');

        }catch (\Exception $e){
            return $e;
        }
    }

    public function classlistview(){
        $classes = Classes::all();
        return view('class_list', compact('classes'));
    }

    public function edit($id){

        $classes = Classes::query()
            ->where('id', $id)
            ->first();
        return view('classupdateform',compact('classes'));



    }

    public function update(Request $request){
        try {
            Classes::query()
                ->where('id',$request->id)
                ->update([
                    'classid'=>$request-> classid,
                    'classname'=>$request-> classname,



                ]);
            return redirect()->route('class.classlistview');

        }catch (\Exception $e){
            return $e;
        }
    }

    public function delete($id){

        try{
            Classes::query()
                ->where('id',$id)
                ->delete();
            return redirect()->route('class.classlistview');
        } catch
        (\Exception $e){return $e;}
    }

}
