@extends('app')

@push('maintitle')

All Courses
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Courses List</h1>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>

                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Actions</th>

                </tr>
                </thead>

                <tbody>

                @foreach($courses as $course)


                <tr>

                    <td>{{$course->courseid}}</td>
                    <td>{{$course->coursename}}</td>
                    <td>{{$course->ccode}}</td>

                    <td>
                        <a href="{{route('course.edit',$course->id)}}" class="btn btn-dark btn-sm mb-2">Update</a>

                        <a href="{{route('course.delete',$course->id)}}" class="btn btn-warning btn-sm mb-2">Delete</a>

                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>



        </div>
    </div>
</div>

@endsection
