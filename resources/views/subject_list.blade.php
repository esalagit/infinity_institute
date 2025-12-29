@extends('app')

@push('maintitle')

All Subjects
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Subjects List</h1>



            <button id="exportsubjectExcel" class="btn btn-success mb-2">
                Export Excel
            </button>
            <button id="exportsubjectPdf" class="btn btn-danger mb-2">
                Export PDF
            </button>


            <form action="{{route('subject.import')}}" method="post" class="mb-2" enctype="multipart/form-data" accept-charset="utf-8">
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
            <table class="table" id="subjectTable">
                <thead>
                <tr>


                    <th>Subject ID </th>
                    <th>Subject Name </th>
                    <th>Teacher's Name </th>
                    <th>Actions</th>

                </tr>
                </thead>

                <tbody>

                @foreach($subjects as $subject)


                <tr>


                    <td  class="bg-primary">{{$subject->subjectid}}</td>
                    <td  class="bg-primary">{{$subject->subjectname}}</td>
                    <td  class="bg-primary">{{$subject->techname ? $subject->techname->teachername : 'N/A'}}</td>


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
