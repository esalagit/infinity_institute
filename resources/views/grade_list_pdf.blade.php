<!DOCTYPE html>
<html>
<head>
    <title>Grades List</title>
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

<h2>Grades List</h2>

<table>
    <thead>
    <tr>
        <th>Grade ID</th>
        <th>Grade Name</th>
        <th>Class Name</th>

    </tr>
    </thead>
    <tbody>
    @foreach($grades as $grade)
        <tr>      <td>{{$grade->gradeid}}</td>
            <td>{{$grade->gradename}}</td>
            <td>{{ $grade->classroom ? $grade->classroom->classname : 'N/A' }}</td>


        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
