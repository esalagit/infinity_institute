<!DOCTYPE html>
<html>
<head>
    <title>Courses List</title>
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

<h2>Courses List</h2>

<table>
    <thead>
    <tr>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Subject Name</th>

    </tr>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr>  <td>{{$course->courseid}}</td>
            <td>{{$course->coursename}}</td>
            <td>{{ $course->subjectview ? $course->subjectview->subjectname: 'N/A' }}</td>


        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
