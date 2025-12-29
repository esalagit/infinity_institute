@extends('app')

@push('maintitle')

All Classes
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Classes List</h1>

            <button id="exportclassExcel" class="btn btn-success mb-2">
                Export Excel
            </button>
            <button id="exportclassPdf" class="btn btn-danger mb-2">
                Export PDF
            </button>

            <form action="{{ route('class.import') }}" method="post"  class="mb-2" enctype="multipart/form-data" accept-charset="utf-8">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                            <input type="file" name="excel" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <input type="submit" value="import" class="btn btn-primary">
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-12">
            <table class="table" id="classTable">
                <thead>
                <tr>

                    <th>Class ID</th>
                    <th>Class Name</th>
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
