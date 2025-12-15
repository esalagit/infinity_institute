@extends('app')

@push('title')

    student Update
@endpush
@push('maintitle')

    Student Update Form
@endpush

@section('content')



    <div class="container">


        <div class="col-6">


            <form method="POST" action="{{route('student.update')}}" class="registration-form w-50">
                @csrf


                <input type="hidden" name="id" value="{{$student->id}}">
                <label>Student ID</label>
                <input type="text" name="sid"  placeholder="Enter Student ID" value="{{$student->sid}}" >
                <br>
                <label>Full Name</label>
                <input type="text" name="name"  placeholder="Enter FULL Name" value="{{$student->name}}">
                <br>
                <label>Address</label>
                <input type="text" name="address"  placeholder="Enter Address" value="{{$student->address}}" >
                <br>
                <label>Email</label>
                <input type="text" name="email"  placeholder="Enter Email" value="{{$student->email}}">
                <br>
                <label>Phone No 1</label>
                <input type="number" name="phone1"  placeholder="Enter Phone No 1" value="{{$student->phone1}}" >
                <br>
                <label>Phone No 2</label>
                <input type="number" name="phone2"  placeholder="Enter Phone No 2" value="{{$student->phone2}}" >
                <br>
                <label>Parent's Contact No</label>
                <input type="number" name="pphone"  placeholder="Enter Parent's Phone No" value="{{$student->pphone}}" >
                <br>
                <label>Course</label>
                <input type="text" name="course"  placeholder="Select Course" value="{{$student->course}}">
                <br>
                <label>Grade</label>
                <select name="grade_id" class="form-control" required>
                    @foreach ($grades as $grade)


                        <option value="{{ $grade->id }}">{{ $grade->gradename}}</option>
                    @endforeach
                </select>
                <br>

                <button type="submit" class="btn btn-warning w-75 mt-5">Update Student</button>
            </form>

            <div class="row">
                <div class="col-12">



                    <a href="{{route('student.studentlistview')}}" class="btn btn-primary mt-3">To Student List</a>

                </div>
            </div>
        </div>
    </div>


@endsection
