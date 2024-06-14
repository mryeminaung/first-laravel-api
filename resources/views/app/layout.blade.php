<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @vite('resources/css/app.css') -->
    @yield('title')
</head>

<body class="container mx-auto text-2xl">

    <nav class="space-x-10">
        <a href="/articles">Articles</a>
    </nav>

    @yield('content')
    The current UNIX timestamp is {{ time() }}.
    Hello, {!! $name !!}
    Hello, {{ $name }}.

    <hr />

    @if (count($articles) === 1)
        <h2>I have one record!</h2>
    @elseif (count($articles) > 1)
        <h2>I have multiple records!</h2>
    @else
        <h2>I don't have any records!</h2>
    @endif

</body>

</html>
