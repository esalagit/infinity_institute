@extends('app')

@push('title')
    Grade Update
@endpush

@push('maintitle')
    Grade Update Form
@endpush

@section('content')
    <div class="container mt-3">

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form method="post" action="{{ route('grade.update') }}" class="registration-form w-50">
                    @csrf
                    <input type="hidden" name="id" value="{{ $grades->id }}">

                    <label>Grade ID</label>
                    <input type="text" class="form-control" name="gradeid" value="{{ $grades->gradeid }}" placeholder="Enter Grade ID" required>
                    <br>

                    <label>Grade Name</label>
                    <input type="text" class="form-control" name="gradename" value="{{ $grades->gradename }}" placeholder="Enter Grade Name" required>
                    <br>
                    <label>Class</label>
                    <select name="class_id" class="form-control" required>
                        @foreach ($classes as $class)


                            <option value="{{ $class->id }}">{{ $class->classname }}</option>
                        @endforeach
                    </select>
                    <br>

                    <button type="submit" class="btn btn-success w-75 mt-4">Update Grade</button>
                </form>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('grade.gradelistview') }}" class="btn btn-primary">Go To Grade List</a>
            <a href="{{ route('class.classlistview') }}" class="btn btn-primary">Go To Classes List</a>
        </div>

    </div>
@endsection
