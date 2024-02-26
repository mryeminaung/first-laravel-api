<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    @vite('resources/css/app.css')
    @yield('title')
</head>

<body class="container mx-auto">
    <nav class="my-3">
        <ul class="flex gap-x-3">
            <li><a class="p-2 bg-slate-300 rounded-lg" href="/">Home</a></li>
            <li><a class="p-2 bg-slate-300 rounded-lg" href="/blogs">Blogs</a></li>
        </ul>
    </nav>
    <div class="flex flex-col gap-y-3">
        @yield('content')
    </div>
</body>

</html>
