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
    <div class="col-8 d-flex justify-content-center" >


            <form method="post" action="{{route('course.update')}}" class="registration-form w-50">
                @csrf
                <input type="hidden" name="id" value="{{$course->id}}">
                <label>Course ID</label>
                <input type="text" class="form-control" name="courseid" value="{{$course->courseid}}" placeholder="Enter Course ID" required>
                <br>
                <label>Course Name</label>
                <input type="text" class="form-control" name="coursename" value="{{$course->coursename}}"   placeholder="Enter Course Name" required>
                <br>
                <label>Subject</label>
                <select name="subject_id" class="form-control" required>
                    @foreach ($subjects as $subject)


                        <option value="{{ $subject->id }}">{{ $subject->subjectname }}</option>
                    @endforeach
                </select>
                <br>


                <button type="submit" class="btn btn-success w-75 mt-5">Update Course</button>
            </form>



            </div>

        </div>

        <div class="div col-8 mt-2">

        <a href="{{route('course.courselistview')}}" class="btn btn-primary">
            Go To Courses List
        </a>


    </div>
    </div>


@endsection
