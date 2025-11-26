@extends('app')

@push('maintitle')

All Subjects
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Subjects List</h1>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>

                    <th >Course Code</th>
                    <th>Subject ID 1</th>
                    <th>Subject Name 1</th>
                    <th>Subject ID 2</th>
                    <th>Subject Name 2</th>
                    <th>Subject ID 3</th>
                    <th>Subject Name 3</th>
                    <th>Subject ID 4</th>
                    <th>Subject Name 4</th>
                    <th>Actions</th>

                </tr>
                </thead>

                <tbody>

                @foreach($subjects as $subject)


                <tr>

                    <td>{{$subject->ccode}}</td>
                    <td  class="bg-primary">{{$subject->subid1}}</td>
                    <td  class="bg-primary">{{$subject->subname1}}</td>
                    <td class="bg-warning">{{$subject->subid2}}</td>
                    <td class="bg-warning">{{$subject->subname2}}</td>
                    <td class="bg-danger">{{$subject->subid3}}</td>
                    <td class="bg-danger">{{$subject->subname3}}</td>
                    <td class="bg-info">{{$subject->subid4}}</td>
                    <td class="bg-info">{{$subject->subname4}}</td>

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
