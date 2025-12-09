@extends('app')

@push('title')

    student Details
@endpush
@push('maintitle')

    Student Details Window
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">

    <div class="col-12">

        <div class="row">
            @foreach($students as $student)
            <div class="col-4 mb-2">

                <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/'.$student->nicf)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$student->name}}</h5>
                        <br>

                        <p class="card-text">{{$student->email}}</p>
                        <br>
                        <p class="card-text">{{$student->course}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>

    </div>



    </div>


@endsection
