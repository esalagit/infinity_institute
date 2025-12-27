@extends('app')

@push('maintitle')

All Courses
@endpush

@section('content')

<div class="container">


    <div class="row">
        <div class="col-12">
            <h1>Courses List</h1>

            <button id="exportcourseExcel" class="btn btn-success mb-2">
                Export Excel
            </button>
            <a href="{{route('course.export.pdf')}}" class="btn btn-danger mb-2">
                Export PDF
            </a>

            <form action="{{ route('course.import') }}" method="post" class="mb-2"  enctype="multipart/form-data" accept-charset="utf-8">
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
