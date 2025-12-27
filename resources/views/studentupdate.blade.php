@extends('app')

@push('title')

    student Update
@endpush
@push('maintitle')

    Student Update Form
@endpush

@section('content')



    <div class="container mt-3">

        <div class="row">
            <div class="col-8 d-flex justify-content-center" >


            <form method="POST" action="{{route('student.update')}}" class="registration-form w-50">
                @csrf


                <input type="hidden" name="id" value="{{$students->id}}">
                <label>Student ID</label>
                <input type="text" class="form-control" name="sid"  placeholder="Enter Student ID" value="{{$students->sid}}" >
                <br>
                <label>Full Name</label>
                <input type="text" class="form-control" name="name"  placeholder="Enter FULL Name" value="{{$students->name}}">
                <br>
                <label>Address</label>
                <input type="text" class="form-control" name="address"  placeholder="Enter Address" value="{{$students->address}}" >
                <br>
                <label>Email</label>
                <input type="text" class="form-control" name="email"  placeholder="Enter Email" value="{{$students->email}}">
                <br>
                <label>Phone No 1</label>
                <input type="number" class="form-control" name="phone1"  placeholder="Enter Phone No 1" value="{{$students->phone1}}" >
                <br>
                <label>Phone No 2</label>
                <input type="number" class="form-control" name="phone2"  placeholder="Enter Phone No 2" value="{{$students->phone2}}" >
                <br>
                <label>Parent's Contact No</label>
                <input type="number" class="form-control" name="pphone"  placeholder="Enter Parent's Phone No" value="{{$students->pphone}}" >
                <br>

                <label>Subject</label>
                <select name="subject_id" class ="form-control" required>
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">
                            {{$subject->subjectname}}
                        </option>
                    @endforeach
                </select>
                <br>

                <button type="submit" class="btn btn-warning w-75 mt-5">Update Student</button>
            </form>


            </div>


        </div>

        <div class="col-5 justify-content-end" >



        </div>


        <div class="div col-8 mt-2">



                    <a href="{{route('student.studentlistview')}}" class="btn btn-primary mt-3">To Student List</a>

                </div>
            </div>




@endsection
