@extends('app')

@push('title')

    Class Update
@endpush
@push('maintitle')

    Class Update Form
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">
        <div class="col-12 d-flex justify-content-center" >


            <form method="post" action="{{route('class.update')}}" class="registration-form w-50">
                @csrf
                <input type="hidden" name="id" value="{{$classes->id}}">
                <label>Course ID</label>
                <input type="text" class="form-control" name="classid" value="{{$classes->classid}}" placeholder="Enter class ID" required>
                <br>
                <label>Course Name</label>
                <input type="text" class="form-control" name="classname" value="{{$classes->classname}}"   placeholder="Enter class Name" required>
                <br>

                <button type="submit" class="btn btn-success w-75 mt-5">Update Class</button>
            </form>



            </div>

        </div>

        <a href="{{route('class.classlistview')}}" class="btn btn-primary">
            Go To Classes List
        </a>


    </div>


@endsection
