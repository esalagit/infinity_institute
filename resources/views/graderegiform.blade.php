@extends('app')

@push('title')

   Grade Registor
@endpush
@push('maintitle')

    Grade Register Form
@endpush


@section('content')



    <div class="container mt-3">

<div class="row">
        <div class="col-12 d-flex justify-content-center" >


            <form method="post" action="{{route('grade.grsave')}}" class="registration-form w-50">
                @csrf

                <label>Grade ID</label>
                <input type="text" class="form-control" name="gradeid"  placeholder="Enter Grade ID" required>
                <br>
                <label>Grade</label>
                <input type="text" class="form-control" name="gradename"  placeholder="Enter Grade Name" required>
                <br>
                <select name="classname" class="form-control" required>
                    <option value="">-- Select Class --</option>
                    @foreach($classes as $class)
                        <option value="{{ $class->classname }}">{{ $class->classname }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-success w-75 mt-5"> Register Grade</button>
            </form>



            </div>

        </div>

            <div class="mt-3" >
                <a href="{{route('grade.gradelistview')}}" class="btn btn-primary">
                    Go To Grade List
                </a>

                <a href="{{route('class.classlistview')}}" class="btn btn-primary">
                    Go To classes List
                </a>




        </div>


    </div>


@endsection
