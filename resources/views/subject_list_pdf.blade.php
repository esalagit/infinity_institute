<!DOCTYPE html>
<html>
<head>
    <title>Subjects List</title>
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

<h2>Subjects List</h2>

<table>
    <thead>
    <tr>
        <th>Subject ID</th>
        <th>Subject Name</th>
        <th>Teacher Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($subjects as $subject)
        <tr>
            <td>{{ $subject->subjectid }}</td>
            <td>{{ $subject->subjectname }}</td>
            <td>{{ $subject->techname ? $subject->techname->teachername : 'N/A' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
