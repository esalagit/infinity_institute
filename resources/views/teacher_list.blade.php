@extends('app')

@push('maintitle')

All Teachers In Institute
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Teachers List</h1>
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
                    <th>Course 1</th>
                    <th>Course 2</th>
                    <th>Subject 1</th>
                    <th>Subject 2</th>
                    <th>Subject 3</th>
                    <th>Grade</th>
                    <th>Class Name</th>
                    <th>Actions</th>

                </tr>
                </thead>

                <tbody>

                @foreach($teachers as $teacher)


                <tr>

                    <td>{{$teacher->tid}}</td>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->address}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>{{$teacher->phone1}}</td>
                    <td>{{$teacher->phone2}}</td>
                    <td>{{$teacher->course1}}</td>
                    <td>{{$teacher->course2}}</td>
                    <td>{{$teacher->subject1}}</td>
                    <td>{{$teacher->subject2}}</td>
                    <td>{{$teacher->subject3}}</td>
                    <td>{{$teacher->grade}}</td>
                    <td>{{$teacher->class}}</td>
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
