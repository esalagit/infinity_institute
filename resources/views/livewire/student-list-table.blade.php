<div>
    <table id="studentsTable" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Phone 1</th>
            <th scope="col">Phone 2</th>
            <th scope="col">Parent Phone</th>
            <th scope="col">Course</th>
            <th scope="col">Grade</th>
            <th scope="col">Class</th>
            <th scope="col">Actions</th>












        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
        <tr>

            <td>{{$student->sid}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->address}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->phone1}}</td>
            <td>{{$student->phone2}}</td>
            <td>{{$student->pphone}}</td>
            <td>{{$student->course}}</td>
            <td>{{$student->grade}}</td>
            <td>{{$student->class}}</td>
            <td>
                <a href="{{route('student.edit',$student->id)}}" class="btn btn-dark btn-sm mb-2">Update</a>

                <a href="{{route('student.delete',$student->id)}}" class="btn btn-warning btn-sm mb-2">Delete</a>

            </td>
        </tr>
        @endforeach


        </tbody>
    </table>
</div>
