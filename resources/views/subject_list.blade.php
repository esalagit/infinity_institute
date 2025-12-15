@extends('app')

@push('maintitle')

All Subjects
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Subjects List</h1>

            <a href="{{ route('subject.export') }}" class="btn btn-success mb-2 ">
                Export Excel
            </a>
        </div>
        <div class="col-12">
            <table class="table" id="subjectTable">
                <thead>
                <tr>


                    <th>Subject ID </th>
                    <th>Subject Name </th>
                    <th>Actions</th>

                </tr>
                </thead>

                <tbody>

                @foreach($subjects as $subject)


                <tr>


                    <td  class="bg-primary">{{$subject->subjectid}}</td>
                    <td  class="bg-primary">{{$subject->subjectname}}</td>


                    <td>
                        <a href="{{route('subject.edit',$subject->id)}}" class="btn btn-dark btn-sm mb-2">Update</a>

                        <a href="{{route('subject.delete',$subject->id)}}" class="btn btn-warning btn-sm mb-2">Delete</a>

                    </td>

                </tr>
                @endforeach
                </tbody>
            </table>



        </div>
    </div>
</div>

@endsection
