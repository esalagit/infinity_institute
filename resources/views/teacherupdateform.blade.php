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
                <input type="text" class="form-control"  value="{{$teacher->teachername}}" name="teachername"  placeholder="Enter FULL Name" required>
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


                <button type="submit" class="btn btn-success w-75 mt-5">Update Teacher</button>
            </form>


            </div>

        </div>

        <a href="{{route('teacher.teacherlistview')}}" class="btn btn-primary">
            Go To Teacher List
        </a>


    </div>


@endsection
