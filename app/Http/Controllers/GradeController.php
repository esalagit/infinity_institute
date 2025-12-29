<?php

namespace App\Http\Controllers;


use App\Exports\GradeExport;
use App\Imports\GradeImport;
use App\Models\Classes;
use App\Models\Grade;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class GradeController extends Controller
{
    public function graderegiview()

    {   $classes = Classes::all();


        return view('graderegiform',compact('classes'));
    }

    public function gradelistview()
    {
        $grades = Grade::with('classroom')->get();
        return view('grade_list', compact('grades'));
    }


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'gradeid'   => 'required|string|max:255',
                'gradename' => 'required|string|max:255',
                'class_id'  => 'required|exists:classes,id',
            ]);
            Grade::create([
                'gradeid'   => $validated['gradeid'],
                'gradename' => $validated['gradename'],
                'class_id'  => $validated['class_id'],
            ]);


            return redirect()->route('grade.gradelistview');

        } catch (\Exception $e) {
            return $e;
        }
    }




    public function edit($id){

        $grades = Grade::query()
            ->where('id', $id)
            ->first();
        $classes = Classes::all();

        return view('gradeupdateform',compact('grades','classes'));
    }







    public function update(Request $request){
        try {
            $validated = $request->validate([
                'id'        => 'required|exists:grades,id',
                'gradeid'   => 'required|string|max:255',
                'gradename' => 'required|string|max:255',
                'class_id'  => 'required|exists:classes,id',
            ]);

            Grade::where('id', $validated['id'])->update([
                'gradeid'   => $validated['gradeid'],
                'gradename' => $validated['gradename'],
                'class_id'  => $validated['class_id'],
            ]);
            return redirect()->route('grade.gradelistview')->with('success', 'Grade updated.');

        }catch (\Exception $e){
            return $e;
        }
    }


    public function delete($id){

        try{
            Grade::query()
                ->where('id',$id)
                ->delete();
            return redirect()->route('grade.gradelistview');
        } catch
        (\Exception $e){return $e;}
    }



    public function importExcel(Request $request)
    {

        Excel::import(new GradeImport(), $request->file('excel'));
        return redirect()->route('grade.gradelistview');

    }

    public function exportExcel(Request $request)
    {
        $search = $request->get('search');

        return Excel::download(new GradeExport($search), 'grades.xlsx');
    }


    public function exportPdf(Request $request)
    {
        $search = $request->get('search');

        $grades = Grade::with('classroom')
            ->when($search, function ($query) use ($search) {
                $query->where('gradeid', 'like', "%{$search}%")
                    ->orWhere('gradename', 'like', "%{$search}%")
                    ->orWhereHas('classroom', function ($q) use ($search) {
                        $q->where('classname', 'like', "%{$search}%");
                    });
            })
            ->get();

        $pdf = Pdf::loadView('grade_list_pdf', compact('grades'));

        return $pdf->download('grades.pdf');
    }


}
