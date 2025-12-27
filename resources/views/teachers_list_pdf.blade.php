<!DOCTYPE html>
<html>
<head>
    <title>Teachers List</title>
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

<h2>Teachers List</h2>

<table>
    <thead>
    <tr>
        <th>Teacher ID</th>
        <th>Full Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone NO 1</th>
        <th>Phone NO 2</th>
        <th>Teaching grade</th>
        <th>Teaching Subject</th>

    </tr>
    </thead>
    <tbody>
    @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->tid }}</td>
            <td>{{ $teacher->teachername }}</td>
            <td>{{ $teacher->address }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->phone1 }}</td>
            <td>{{ $teacher->phone2 }}</td>
            <td>{{$teacher->teachergrade ? $teacher -> teachergrade->gradename:'N/A'}}</td>
            <td>{{$teacher->teachersubject ? $teacher-> teachersubject -> subjectname:'N/A'}}</td>

        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
