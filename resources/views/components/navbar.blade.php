<nav class="navbar navbar-dark bg-dark">
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
            <a href="/blogs#subscribe" class="nav-link">Subscribe</a>
        </div>
    </div>
</nav>
