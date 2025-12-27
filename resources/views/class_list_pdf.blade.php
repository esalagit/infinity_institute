<!DOCTYPE html>
<html>
<head>
    <title>Classes List</title>
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

<h2>Classes List</h2>

<table>
    <thead>
    <tr>
        <th>Class ID</th>
        <th>Class Name</th>

    </tr>
    </thead>
    <tbody>
    @foreach($classes as $class)
        <tr>     <td>{{$class->classid}}</td>
            <td>{{$class->classname}}</td>


        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
