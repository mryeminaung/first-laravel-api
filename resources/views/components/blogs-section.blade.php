{{-- props are passed down by its parent components --}}
@props(['blogs'])

<section class="container " id="blogs">
    <h1 class="mb-4 text-center display-5 fw-bold">Blogs</h1>

    <x-category-dropdown />

    <form action="" method="GET" class="my-3" autocomplete="false">
        <div class="mb-3 input-group">

            {{-- add other query string based on request keywords --}}

            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}" />
            @endif

            @if (request('username'))
                <input type="hidden" name="username" value="{{ request('username') }}" />
            @endif

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
