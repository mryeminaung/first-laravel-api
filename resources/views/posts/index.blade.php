<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts List</title>
</head>

<body>
    <h1>Posts List</h1>
    <ul>
        @foreach($posts as $post)
        <li>{{$post['title']}}</li>
        @endforeach
    </ul>
</body>

</html>
