@extends('app')

@push('maintitle')

All Classes
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Classes List</h1>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>

                    <th>Class ID</th>
                    <th>Course Name</th>
                    <th>Actions</th>

                </tr>
                </thead>

                <tbody>

                @foreach($classes as $class)


                <tr>

                    <td>{{$class->classid}}</td>
                    <td>{{$class->classname}}</td>


                    <td>
                        <a href="{{route('class.edit',$class->id)}}" class="btn btn-dark btn-sm mb-2">Update</a>

                        <a href="{{route('class.delete',$class->id)}}" class="btn btn-warning btn-sm mb-2">Delete</a>

                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>



        </div>
    </div>
</div>

@endsection
