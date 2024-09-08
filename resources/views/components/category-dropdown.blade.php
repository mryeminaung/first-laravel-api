@props(['categories'])

<div class="text-center d-flex justify-content-center">
    {{-- filter by category --}}
    <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ request('category') ?? 'Filter by Category' }}
        </button>
        <ul class="dropdown-menu">
            @foreach ($categories as $category)
                <li>
                    <a class="dropdown-item" href="/blogs/?category={{ $category->slug }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
