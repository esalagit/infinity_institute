@extends('app')

@push('title')

    Course Update
@endpush
@push('maintitle')

    Course Update Form
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">
        <div class="col-12 d-flex justify-content-center" >


            <form method="post" action="{{route('course.update')}}" class="registration-form w-50">
                @csrf
                <input type="hidden" name="id" value="{{$course->id}}">
                <label>Course ID</label>
                <input type="text" class="form-control" name="courseid" value="{{$course->courseid}}" placeholder="Enter Course ID" required>
                <br>
                <label>Course Name</label>
                <input type="text" class="form-control" name="coursename" value="{{$course->coursename}}"   placeholder="Enter Course Name" required>
                <br>
                <label>Course Code</label>
                <input type="text" class="form-control" name="ccode"  value="{{$course->ccode}}"  placeholder="Enter Course Code" required>
                <br>

                <button type="submit" class="btn btn-success w-75 mt-5">Update Course</button>
            </form>



            </div>

        </div>

        <a href="{{route('course.courselistview')}}" class="btn btn-primary">
            Go To Courses List
        </a>


    </div>


@endsection
