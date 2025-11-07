@extends('app')

@push('maintitle')

All Students In Institute
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Students List</h1>
        </div>
        <div class="col-6">
            <table class="table">
                <thead>
                <tr>

                    <th>Reg No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Class</th>
                    <th>Actions</th>

                </tr>
                </thead>

                <tbody>

                @foreach($students as $student)


                <tr>

                    <td>{{$student->reg_no}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->class}}</td>
                    <td>
                        <button class="btn btn-dark btn-sm mb-2">Update</button>

                        <button class="btn btn-warning btn-sm">Delete</button>

                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
