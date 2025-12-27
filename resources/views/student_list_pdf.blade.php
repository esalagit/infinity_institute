<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Students List</h2>

<table>
    <thead>
    <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone NO 1</th>
        <th>Phone NO 2</th>
        <th>Parent's Phone</th>
        <th>Subject</th>

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
            <td>{{$student->subject ? $student -> subject->subjectname: 'N/A'}}</td>

        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
