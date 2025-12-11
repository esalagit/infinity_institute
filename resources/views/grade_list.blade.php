@extends('app')

@push('maintitle')

All Grades
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Grade List</h1>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>

                    <th>Grade ID</th>
                    <th>Grade Name</th>
                    <th>Class Name</th>
                    <th>Actions</th>

                </tr>
                </thead>

                <tbody>

                @foreach($grades as $grade)


                <tr>

                    <td>{{$grade->gradeid}}</td>
                    <td>{{$grade->gradename}}</td>
                    <td>{{ $grade->classroom ? $grade->classroom->classname : 'N/A' }}</td>

                    <td>
                        <a href="{{route('grade.edit',$grade->id)}}" class="btn btn-dark btn-sm mb-2">Update</a>

                        <a href="{{route('grade.delete',$grade->id)}}" class="btn btn-warning btn-sm mb-2">Delete</a>

                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>



        </div>
    </div>
</div>

@endsection
