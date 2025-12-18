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


            <form method="post" action="{{route('teacher.tsave')}}" class="registration-form w-50" enctype="multipart/form-data">
                @csrf
                <label>Teacher ID</label>
                <input type="text" class="form-control" name="tid"  placeholder="Enter Teacher ID" required>
                <br>
                <label>Teacher Full Name</label>
                <input type="text" class="form-control" name="teachername"  placeholder="Enter FULL Name" required>
                <br>
                <label>Address</label>
                <input type="text"  class="form-control" name="address"  placeholder="Enter Address" required>
                <br>
                <label>Email</label>
                <input type="email" class="form-control" name="email"  placeholder="Enter Email" required>
                <br>
                <label>Phone No</label>
                <input type="number" class="form-control" name="phone1"  placeholder="Enter Phone No 1" required>
                <br>
                <input type="number" class="form-control" name="phone2"  placeholder="Enter Phone No 2" required>
                <br>
                <label>NIC Photo Front</label>
                <input type="file" class="form-control" name="nicf"  placeholder="Upload NIC Front" required>
                <br>
                <label>NIC Photo Back</label>
                <input type="file" class="form-control" name="nicb"  placeholder="Upload NIC Front" required>
                <br>


                <label>Teacher's Grade</label>
                <select name="grade_id" class="form-control" required>
                    @foreach($grades as $grade)
                        <option value="{{$grade->id}}"> {{$grade->gradename}}</option>
                    @endforeach
                </select>
                <br>




                <label>Teaching Subject</label>
               <select name="subject_id" class="form-control" required>
                   @foreach($subjects as $subject)
                       <option value="{{$subject->id}}"> {{$subject->subjectname}}</option>
                   @endforeach
               </select>
                <br>

                <label>Password</label>
                <input type="password" class="form-control"  name="password"  placeholder="Create and Enter Password" required>
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
