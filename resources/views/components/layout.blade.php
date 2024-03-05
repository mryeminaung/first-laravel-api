<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    {{ $title }}
    <style>
        .truncate-line {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .truncate-2-lines {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>
</head>

<body class="m-5">

    <div class="container mx-auto">
        <h1 class="text-2xl font-bold underline underline-offset-4 my-4">
            Live as if you were to die tomorrow. Learn as if youwere to live forever. - Mahatma Gandhi
        </h1>

        <a href="/posts" class="rounded-md bg-slate-400 p-2 my-2 inline-flex text-center">All Posts</a>
        <a href="/create" class="rounded-md bg-slate-400 p-2 my-2 inline-flex text-center">Add Post</a>

        {{ $content }}

    </div>
</body>

</html>
