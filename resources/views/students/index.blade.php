<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Students List</h1>
    <ul>
        @foreach ($students as $student)
        <li>{{$student['name']}}</li>
        <li>{{$student['email']}}</li>
        <hr />
        @endforeach
    </ul>
</body>
</html>
