@extends('app')

@push('title')

    teacher Registor
@endpush
@push('maintitle')

    Teacher Register Form
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">
        <div class="col-12 d-flex justify-content-center" >


            <form method="post" action="{{route('teacher.tsave')}}" class="registration-form w-50">
                @csrf
                <label>Teacher ID</label>
                <input type="text" class="form-control" name="tid"  placeholder="Enter Teacher ID" required>
                <br>
                <label>Teacher Full Name</label>
                <input type="text" class="form-control" name="name"  placeholder="Enter FULL Name" required>
                <br>
                <label>Address</label>
                <input type="text"  class="form-control" name="address"  placeholder="Enter Address" required>
                <br>
                <label>Email</label>
                <input type="text" class="form-control" name="email"  placeholder="Enter Email" required>
                <br>
                <label>Phone No</label>
                <input type="number" class="form-control" name="phone1"  placeholder="Enter Phone No 1" required>
                <br>
                <input type="number" class="form-control" name="phone2"  placeholder="Enter Phone No 2" required>
                <br>
                <label>Course 1</label>
                <input type="text" class="form-control" name="course1"  placeholder="Enter Course Name" required>
                <br>
                <label>Course 2</label>
                <input type="text" class="form-control" name="course2"  placeholder="Enter Course 2 Name" >
                <br>
                <label>Subject 1</label>
                <input type="text" class="form-control" name="subject1"  placeholder="Enter your subject" required>
                <br>
                <label>Subject 2</label>
                <input type="text" class="form-control" name="subject2"  placeholder="Enter your subject 2">
                <br>
                <label>Subject 3</label>
                <input type="text" class="form-control" name="subject3"  placeholder="Enter your subject 3">
                <br>
                <label>Grade</label>
                <input type="text" class="form-control" name="grade"  placeholder="Enter Grade" required>
                <br>
                <label>Class Name</label>
                <input type="text" class="form-control" name="class"  placeholder="Enter Class Name" required>
                <br>

                <button type="submit" class="btn btn-success w-75 mt-5">Register Teacher</button>
            </form>


            </div>

        </div>

        <a href="{{route('teacher.teacherlistview')}}" class="btn btn-primary">
            Go To Teacher List
        </a>


    </div>


@endsection
