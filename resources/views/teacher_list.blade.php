@extends('app')

@push('maintitle')

All Teachers In Institute
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">




            <h1>Teachers List</h1>

            <button id="exportteacherExcel" class="btn btn-success mb-2">
                Export Excel
            </button>

            <button id="exportteacherPdf" class="btn btn-danger mb-2">
                Export PDF
            </button>

            <form action="{{route('teacher.import')}}" method="post" class="mb-2" enctype="multipart/form-data" accept-charset="utf-8">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                            <input type="file" name="excel" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <input type="submit" value="import" class="btn btn-primary">
                        </div>
                    </div>
                </div>

            </form>



        </div>
        <div class="col-12">
            <table class="table" id="teacherTable">
                <thead>
                <tr>

                    <th>Teacher ID</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone NO 1</th>
                    <th>Phone NO 2</th>
                    <th>Teaching grade</th>
                    <th>Teaching Subject</th>
                    <th>Actions</th>

                </tr>
                </thead>

                <tbody>

                @foreach($teachers as $teacher)


                <tr>

                    <td>{{$teacher->tid}}</td>
                    <td>{{$teacher->teachername}}</td>
                    <td>{{$teacher->address}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>{{$teacher->phone1}}</td>
                    <td>{{$teacher->phone2}}</td>
                    <td>{{$teacher->teachergrade ? $teacher -> teachergrade->gradename:'N/A'}}</td>
                    <td>{{$teacher->teachersubject ? $teacher-> teachersubject -> subjectname:'N/A'}}</td>
                    <td>
                        <a href="{{route('teacher.edit',$teacher->id)}}" class="btn btn-dark btn-sm mb-2">Update</a>

                        <a href="{{route('teacher.delete',$teacher->id)}}" class="btn btn-warning btn-sm mb-2">Delete</a>

                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>


            <a href="{{route('teacher.tregiform')}}" class="btn btn-primary mt-3">Register Teacher</a>
        </div>
    </div>
</div>

@endsection
