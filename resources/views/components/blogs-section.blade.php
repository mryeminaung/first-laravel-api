{{-- props are passed down by its parent components --}}
@props(['blogs', 'categories', 'currentCategory'])

<section class="container " id="blogs">
    <h1 class="mb-4 text-center display-5 fw-bold">Blogs</h1>
    <div class="text-center d-flex justify-items-center">
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
    <form action="" method="GET" class="my-3" autocomplete="false">
        <div class="mb-3 input-group">
            <input type="text" name="search" value="{{ request('search') ?? '' }}" class="form-control"
                placeholder="Search Blogs..." required />
            <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
                Search
            </button>
        </div>
    </form>
    <div class="row">

        @forelse($blogs as $blog)
            <div class="mb-4 col col-md-6 col-lg-4">
                <x-blog-card :blog="$blog" />
            </div>
        @empty
            <x-card-wrapper>
                <h2 class="text-center">No blogs are found!!!</h2>
            </x-card-wrapper>
        @endforelse
        {{ $blogs->links() }}
    </div>
</section>
