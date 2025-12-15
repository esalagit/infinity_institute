@extends('app')

@push('maintitle')

All Courses
@endpush

@section('content')

<div class="container">


    <div class="row">
        <div class="col-12">
            <h1>Courses List</h1>

            <a href="{{ route('course.export') }}" class="btn btn-success mb-2 ">
                Export Excel
            </a>

        <div class="col-12">
            <table class="table" id="courseTable">
                <thead>
                <tr>

                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Subject Name</th>
                    <th>Actions</th>

                </tr>
                </thead>

                <tbody>

                @foreach($courses as $course)


                <tr>

                    <td>{{$course->courseid}}</td>
                    <td>{{$course->coursename}}</td>
                    <td>{{ $course->subjectview ? $course->subjectview->subjectname: 'N/A' }}</td>


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
