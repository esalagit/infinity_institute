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

                <label>Subject ID</label>
                <input type="text" class="form-control" name="subjectid"  placeholder="Enter Subject ID" required>
                <br>
                <label>Subject Name</label>
                <input type="text" class="form-control" name="subjectname"  placeholder="Enter Subject Name" required>
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
