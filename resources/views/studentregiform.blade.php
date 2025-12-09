@extends('app')

@push('title')

    student Registor
@endpush
@push('maintitle')

    Student Register Form
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">

        <div class="col-8 d-flex justify-content-center" >

        @livewire('student-reg-form')

    </div>


    </div>

        <div class="col-5 justify-content-end" >
            @livewire('student-list-table')


        </div>

        <div class="div col-8 mt-2">
            <a href="{{ route('student.studentlistview') }}" class="btn btn-primary">
                Go To Student List
            </a>
        </div>
</div>
@endsection
