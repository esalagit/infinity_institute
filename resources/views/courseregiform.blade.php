@extends('app')

@push('title')

    Course Registor
@endpush
@push('maintitle')

    Course Register Form
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">
        <div class="col-12 d-flex justify-content-center" >


            <form method="post" action="{{route('course.cusave')}}" class="registration-form w-50">
                @csrf

                <label>Course ID</label>
                <input type="text" class="form-control" name="courseid"  placeholder="Enter Course ID" required>
                <br>
                <label>Course Name</label>
                <input type="text" class="form-control" name="coursename"  placeholder="Enter Course Name" required>
                <br>
                <label>Course Code</label>
                <input type="text" class="form-control" name="ccode"  placeholder="Enter Course Code" required>
                <br>

                <button type="submit" class="btn btn-success w-75 mt-5">Go to Subject Registration Form</button>
            </form>



            </div>

        </div>

            <div class="mt-3" >
                <a href="{{route('course.courselistview')}}" class="btn btn-primary">
                    Go To Courses List
                </a>

                <a href="{{route('subject.subjectlistview')}}" class="btn btn-primary">
                    Go To Subjects List
                </a>




        </div>


    </div>


@endsection
