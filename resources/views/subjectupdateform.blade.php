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
                <input type="hidden" name="id" value="{{$subjects->id}}">

                <label>Subject ID</label>
                <input type="text" class="form-control" value="{{$subjects->subjectid}}" name="subjectid"  placeholder="Enter Subject ID" required>
                <br>
                <label>Subject Name</label>
                <input type="text" class="form-control" value="{{$subjects->subjectname}}" name="subjectname"  placeholder="Enter Subject Name" required>
                <br>
                <label>Teacher's Name</label>
                <select name="teacher_id" class="form-control" required>
                    @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->teachername}}</option>
                    @endforeach
                </select>



                <button type="submit" class="btn btn-success w-75 mt-5">Update Subject</button>
            </form>


            </div>

        </div>

        <a href="" class="btn btn-primary">
            Go To Subject List
        </a>


    </div>


@endsection
