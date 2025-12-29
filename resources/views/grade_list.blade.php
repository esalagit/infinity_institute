@extends('app')

@push('maintitle')

All Grades
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Grade List</h1>

            <button id="exportgradeExcel" class="btn btn-success mb-2">
                Export Excel
            </button>
            <button id="exportgradePdf" class="btn btn-danger mb-2">
                Export Grade
            </button>

            <form action="{{ route('grade.import') }}" method="post" class="mb-2" enctype="multipart/form-data" accept-charset="utf-8">
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
            <table class="table" id="gradeTable">
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
