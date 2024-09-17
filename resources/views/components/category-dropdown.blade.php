@props(['categories', 'tag'])

<div class="text-center mb-3 d-flex align-items-center justify-content-between">
    {{-- filter by category --}}

    <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ request('category') ? $tag : 'Filter by Category' }}
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="/blogs" class="dropdown-item">All</a>
            </li>
            @foreach ($categories as $category)
                <li>
                    <a class="dropdown-item"
                        href="/blogs/?category={{ $category->slug }}{{ request('username') ? '&username=' . request('username') : null }}{{ request('search') ? '&search=' . request('search') : null }}">
                        {{ ucwords($category->name) }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

</div>
