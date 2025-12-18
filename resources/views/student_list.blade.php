@extends('app')

@push('maintitle')

All Students In Institute


@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Students List</h1>
        </div>
        <div class="col-12">


            <a href="{{ route('student.export') }}" class="btn btn-success mb-2 ">
                Export Excel
            </a>

            <table id="studentsTable" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone NO 1</th>
                    <th>Phone NO 2</th>
                    <th>Parent's Phone</th>
                    <th>Subject</th>
                    <th>Actions</th>

                </tr>
                </thead>

                <tbody>

                @foreach($students as $student)


                <tr>

                    <td>{{$student->sid}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone1}}</td>
                    <td>{{$student->phone2}}</td>
                    <td>{{$student->pphone}}</td>
                    <td>{{$student->subname ? $student -> subname->subjectname: 'N/A'}}</td>

                    <td>
                        <a href="{{route('student.edit',$student->id)}}" class="btn btn-dark btn-sm mb-2">Update</a>

                        <a href="{{route('student.delete',$student->id)}}" class="btn btn-warning btn-sm mb-2">Delete</a>

                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>


            <a href="{{route('student.sregiform')}}" class="btn btn-primary mt-3">Register Student</a>
        </div>
    </div>
</div>

@endsection
