@extends('app')

@push('title')

    subject Update
@endpush
@push('maintitle')

    Subject Update Form
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">
        <div class="col-12 d-flex justify-content-center" >


            <form method="post" action="{{route('subject.update')}}" class="registration-form w-50">
                @csrf
                <input type="hidden" name="id" value="{{$subject->id}}">
                <label>Course Code</label>
                <input type="text" class="form-control" value="{{$subject->ccode}}" name="ccode"  placeholder="Enter Course Code" required>
                <br>
                <label>Subject ID</label>
                <input type="text" class="form-control" value="{{$subject->subid1}}" name="subid1"  placeholder="Enter Subject ID" required>
                <br>
                <label>Subject Name</label>
                <input type="text" class="form-control" value="{{$subject->subname1}}" name="subname1"  placeholder="Enter Subject Name" required>
                <br>
                <label>Subject ID</label>
                <input type="text" class="form-control" value="{{$subject->subid2}}" name="subid2"  placeholder="Enter Subject ID" >
                <br>
                <label>Subject Name</label>
                <input type="text" class="form-control" value="{{$subject->subname2}}" name="subname2"  placeholder="Enter Subject Name" >
                <br>
                <label>Subject ID</label>
                <input type="text" class="form-control" value="{{$subject->subid3}}" name="subid3"  placeholder="Enter Subject ID" >
                <br>
                <label>Subject Name</label>
                <input type="text" class="form-control" value="{{$subject->subname3}}" name="subname3"  placeholder="Enter Subject Name" >
                <br>
                <label>Subject ID</label>
                <input type="text" class="form-control" value="{{$subject->subid4}}" name="subid4"  placeholder="Enter Subject ID" >
                <br>
                <label>Subject Name</label>
                <input type="text" class="form-control" value="{{$subject->subname4}}" name="subname4"  placeholder="Enter Subject Name" >
                <br>

                <button type="submit" class="btn btn-success w-75 mt-5">Update Subject</button>
            </form>


            </div>

        </div>

        <a href="" class="btn btn-primary">
            Go To Subject List
        </a>


    </div>


@endsection
