<?php

namespace App\Http\Controllers;


use App\Exports\ClassExport;
use App\Imports\ClassImport;
use App\Models\Classes;


use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ClassController extends Controller
{
    public function classregiview(){
        return view('classregiform');
    }
    public function classlistview(){
        $classes = Classes::all();
        return view('class_list', compact('classes'));
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

    public function importExcel(Request $request)
    {

        Excel::import(new ClassImport(), $request->file('excel'));
        return redirect()->route('class.classlistview');

    }

    public function exportExcel(Request $request)
    {

        $search = $request->get('search');
        return Excel::download(new ClassExport($search), 'classes.xlsx');
    }

    public function exportPdf()
    {

        $classes = Classes::all();
    $pdf = Pdf::loadView('class_list_pdf',compact('classes'));

    return $pdf->download('classes.pdf');


}
}
