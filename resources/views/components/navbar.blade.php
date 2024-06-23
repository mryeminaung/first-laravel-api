<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/blogs">Creative Coder</a>
        <div class="d-flex">
            <a href="/blogs" class="nav-link">Home</a>
            <a href="/blogs#blogs" class="nav-link">Blogs</a>
            <a href="/register" class="nav-link">{{ auth()->user()->name ?? 'Register' }}</a>
            <a href="/blogs#subscribe" class="nav-link">Subscribe</a>
        </div>
    </div>
</nav>
