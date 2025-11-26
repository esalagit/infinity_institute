@extends('app')

@push('title')

    subject Registor
@endpush
@push('maintitle')

    Subject Register Form
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">
        <div class="col-12 d-flex justify-content-center" >


            <form method="post" action="{{route('subject.susave')}}" class="registration-form w-50">
                @csrf
                <label>Course Code</label>
                <input type="text" class="form-control" name="ccode"  placeholder="Enter Course Code" required>
                <br>
                <label>Subject ID</label>
                <input type="text" class="form-control" name="subid1"  placeholder="Enter Subject ID" required>
                <br>
                <label>Subject Name</label>
                <input type="text" class="form-control" name="subname1"  placeholder="Enter Subject Name" required>
                <br>
                <label>Subject ID</label>
                <input type="text" class="form-control" name="subid2"  placeholder="Enter Subject ID" >
                <br>
                <label>Subject Name</label>
                <input type="text" class="form-control" name="subname2"  placeholder="Enter Subject Name" >
                <br>
                <label>Subject ID</label>
                <input type="text" class="form-control" name="subid3"  placeholder="Enter Subject ID" >
                <br>
                <label>Subject Name</label>
                <input type="text" class="form-control" name="subname3"  placeholder="Enter Subject Name" >
                <br>
                <label>Subject ID</label>
                <input type="text" class="form-control" name="subid4"  placeholder="Enter Subject ID" >
                <br>
                <label>Subject Name</label>
                <input type="text" class="form-control" name="subname4"  placeholder="Enter Subject Name" >
                <br>

                <button type="submit" class="btn btn-success w-75 mt-5">Register Subject</button>
            </form>


            </div>

        </div>

        <a href="{{route('subject.subjectlistview')}}" class="btn btn-primary">
            Go To Subject List
        </a>


    </div>


@endsection
