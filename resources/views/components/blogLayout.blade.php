<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    @vite('resources/css/app.css')
    {{ $title }}
</head>

<body class="container mx-auto bg-slate-100">
    <x-navbar />
    {{ $content }}
</body>

</html>