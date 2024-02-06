<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Page</title>
</head>

<body>
    <h1>Student detail for {{$student['id']}}</h1>
    <ul>
        <li>{{$student['name']}}</li>
        <li>{{$student['email']}}</li>
    </ul>
</body>

</html>
