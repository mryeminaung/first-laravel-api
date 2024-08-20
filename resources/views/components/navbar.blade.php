{{-- <nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/blogs">Creative Coder</a>
        <div class="d-flex">
            <a href="/blogs" class="nav-link">Home</a>
            <a href="/blogs#blogs" class="nav-link">Blogs</a>
            @auth
                <a href="/role-checker" class="nav-link">CheckRole</a>
                <a href="/blogs" class="nav-link">Welcome, {{ auth()->user()->name }}</a>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-link text-decoration-none">Logout</button>
                </form>
            @else
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">Login</a>
            @endauth
        </div>
    </div>
</nav> --}}

<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/blogs">Creative Coder</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/blogs">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blogs#blogs">Blogs</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/role-checker">CheckRole</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->username }}"
                                class="rounded-pill" style="width: 35px; height: 35px;">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="btn btn-link text-decoration-none">Logout</button>
                            </form>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
