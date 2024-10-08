<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/images/trans-logo.png" type="image/x-icon">
    {{-- @vite('resources/css/app.css')

    {{-- if no title is passed here, default All blogs will be rendered here --}}
    <title>{{ $title ?? 'All Blogs' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />

    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        .fixed-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body id="home">

    <!-- navbar -->
    <x-navbar />

    <main style="margin-bottom: 150px">
        {{-- default slot --}}
        {{ $slot }}
    </main>

    <!-- footer -->
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>

</html>
