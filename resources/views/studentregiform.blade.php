@extends('app')

@push('title')

    student Registor
@endpush
@push('maintitle')

    Student Register Form
@endpush

@section('content')

    <div class="container">
        <div class="col-6">

            <form method="post" action="{{route('student.stsave')}}" class="registration-form w-50">
                @csrf
                <label>Register No</label>
                <input type="text" name="reg_no"  placeholder="Enter Regi No" required>
                <br>
                <label>Full Name</label>
                <input type="text" name="name"  placeholder="Enter FULL Name" required>
                <br>
                <label>Address</label>
                <input type="text" name="address"  placeholder="Enter Address" required>
                <br>
                <label>Phone No</label>
                <input type="number" name="phone"  placeholder="Enter Phone No" required>
                <br>
                <label>Class Name</label>
                <input type="text" name="class"  placeholder="Enter Class Name" required>
                <br>
                <button type="submit" class="btn btn-success w-75 mt-5">Register Student</button>
            </form>
        </div>
    </div>


@endsection
