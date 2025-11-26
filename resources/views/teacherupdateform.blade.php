@extends('app')

@push('title')

    teacher Update
@endpush
@push('maintitle')

    Teacher Update Form
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">
        <div class="col-12 d-flex justify-content-center" >


            <form method="post" action="{{route('teacher.update')}}" class="registration-form w-50">
                @csrf
                <input type="hidden" name="id" value="{{$teacher->id}}">
                <label>Teacher ID</label>
                <input type="text" class="form-control"  value="{{$teacher->tid}}" name="tid"  placeholder="Enter Teacher ID" required>
                <br>
                <label>Teacher Full Name</label>
                <input type="text" class="form-control"  value="{{$teacher->name}}" name="name"  placeholder="Enter FULL Name" required>
                <br>
                <label>Address</label>
                <input type="text"  class="form-control" value="{{$teacher->address}}" name="address"  placeholder="Enter Address" required>
                <br>
                <label>Email</label>
                <input type="text" class="form-control" value="{{$teacher->email}}" name="email"  placeholder="Enter Email" required>
                <br>
                <label>Phone No</label>
                <input type="number" class="form-control" value="{{$teacher->phone1}}" name="phone1"  placeholder="Enter Phone No 1" required>
                <br>
                <input type="number" class="form-control" value="{{$teacher->phone2}}" name="phone2"  placeholder="Enter Phone No 2" required>
                <br>
                <label>Course 1</label>
                <input type="text" class="form-control" value="{{$teacher->course1}}" name="course1"  placeholder="Enter Course Name" required>
                <br>
                <label>Course 2</label>
                <input type="text" class="form-control" value="{{$teacher->course2}}" name="course2"  placeholder="Enter Course 2 Name" >
                <br>
                <label>Subject 1</label>
                <input type="text" class="form-control" value="{{$teacher->subject1}}" name="subject1"  placeholder="Enter your subject" required>
                <br>
                <label>Subject 2</label>
                <input type="text" class="form-control" value="{{$teacher->subject2}}" name="subject2"  placeholder="Enter your subject 2">
                <br>
                <label>Subject 3</label>
                <input type="text" class="form-control" value="{{$teacher->subject3}}" name="subject3"  placeholder="Enter your subject 3">
                <br>
                <label>Grade</label>
                <input type="text" class="form-control" value="{{$teacher->grade}}" name="grade"  placeholder="Enter Grade" required>
                <br>
                <label>Class Name</label>
                <input type="text" class="form-control" value="{{$teacher->class}}" name="class"  placeholder="Enter Class Name" required>
                <br>

                <button type="submit" class="btn btn-success w-75 mt-5">Update Teacher</button>
            </form>


            </div>

        </div>

        <a href="{{route('teacher.teacherlistview')}}" class="btn btn-primary">
            Go To Teacher List
        </a>


    </div>


@endsection
