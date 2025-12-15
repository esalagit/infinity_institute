@extends('app')

@push('title')

    student Registor
@endpush
@push('maintitle')

    Student Register Form
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">

        <div class="col-8 d-flex justify-content-center" >

            <form method="post" action="{{route('student.stsave')}}" class="registration-form w-100" enctype="multipart/form-data">
                @csrf
                <label>Student ID</label>
                <input type="text" class="form-control"  name="sid" placeholder="Enter Regi No" required>
                <br>
                <label>Full Name</label>
                <input type="text" class="form-control"  name="name" placeholder="Enter FULL Name" required>
                <br>
                <label>Address</label>
                <input type="text"  class="form-control"  name="address"  placeholder="Enter Address" required>
                <br>
                <label>Email</label>
                <input type="email" class="form-control"  name="email"  placeholder="Enter Phone No" required>
                <br>
                <label>Phone No 1</label>
                <input type="number" class="form-control"  name="phone1"  placeholder="Enter Phone No" required>
                <br>
                <label>Phone No 2</label>
                <input type="number" class="form-control"  name="phone2"  placeholder="Enter Phone No" required>
                <br>
                <label>NIC Photo Front</label>
                <input type="file" class="form-control" name="nicf"  placeholder="Upload NIC Front" >
                <br>
                <label>NIC Photo Back</label>
                <input type="file" class="form-control"  name="nicb" placeholder="Upload NIC Front">
                <br>

                <label>Parent's Contact No</label>
                <input type="number" class="form-control"  name="pphone" placeholder="Enter Phone No" required>
                <br>

                <label>Course</label>
                <input type="text" class="form-control"  name="course" placeholder="Enter Course Name" required>
                <br>



                <label>Grade</label>
                <select name="grade_id" class="form-control" required>
                    @foreach ($grades as $grade)


{{--                        <option value="{{ $grade->id }}">{{ $grade->gradename}}</option>--}}

                        <option value="{{ $grade->id }}">
                            {{ $grade->gradename }} - {{ $grade->classroom->classname }}
                        </option>
                    @endforeach
                </select>
                <br>


                <label>Password</label>
                <input type="password" class="form-control"  name="password"  placeholder="Create and Enter Password" required>
                <br>
                <button type="submit" class="btn btn-success w-100 mt-5 mb-3">Register Student</button>
            </form>



        </div>


    </div>

        <div class="col-5 justify-content-end" >



        </div>

        <div class="div col-8 mt-2">
            <a href="{{ route('student.studentlistview') }}" class="btn btn-primary">
                Go To Student List
            </a>
        </div>
</div>
@endsection
