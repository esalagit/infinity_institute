@extends('app')

@push('title')

    Class Registor
@endpush
@push('maintitle')

    Class Register Form
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">
        <div class="col-12 d-flex justify-content-center" >


            <form method="post" action="{{route('class.clsave')}}" class="registration-form w-50">
                @csrf

                <label>Class ID</label>
                <input type="text" class="form-control" name="classid"  placeholder="Enter Class ID" required>
                <br>
                <label>Class Name</label>
                <input type="text" class="form-control" name="classname"  placeholder="Enter Class Name" required>
                <br>


                <button type="submit" class="btn btn-success w-75 mt-5">Register a Class</button>
            </form>



            </div>

        </div>

            <div class="mt-3" >
                <a href="{{route('class.classlistview')}}" class="btn btn-primary">
                    Go To Classes List
                </a>

                <a href="{{route('grade.gradelistview')}}" class="btn btn-primary">
                    Go To Grade List
                </a>




        </div>


    </div>


@endsection
