@props(['blog', 'randomBlogs'])

<x-layout>
    <x-slot name="title">
        {{ ucwords(implode(' ', explode('-', $blog->slug))) }}
    </x-slot>
    <!-- single blog detail section -->
    <div class="container">
        <div class="row">
            <div class="pt-4 mx-auto col-md-12 col-lg-8">
                <a class="btn btn-primary text-decoration-none" href="{{ session('preUrl') }}">Back</a>
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <div class="gap-4 d-flex align-items-center justify-content-between">
                    <h3 class="my-3">{{ $blog->title }}</h3>
                    <form action="{{ route('blogs.subscriptions', $blog) }}" method="POST">
                        @csrf
                        @auth
                            @if (auth()->user()->isSubscribed($blog))
                                <button class="rounded-pill btn btn-sm btn-danger">
                                    Unsubscribe
                                </button>
                            @else
                                @unless (auth()->user()->id == $blog->author->id)
                                    <button class="rounded-pill btn btn-sm btn-warning">
                                        Subscribe
                                    </button>
                                @endunless
                            @endif
                        @endauth
                    </form>
                </div>

                <div class="d-flex align-items-start justify-content-start">
                    <div class="items-center d-flex">
                        <div>
                            <img src="{{ $blog->author->avatar }}" class="rounded-circle" width="50" height="50"
                                alt="">
                        </div>
                        <div class="ms-3 d-flex align-items-start flex-column">
                            <h6>
                                <a class="text-black text-decoration-none" href="/blogs/?username={{ $blog->author->username }}">
                                    {{ $blog->author->name }}
                                </a>
                            </h6>
                            <p class="text-secondary ms-0">
                                {{ $blog->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                    <div class="tags ms-3">
                        <a class="text-decoration-none" href="/blogs/?category={{ $blog->category->slug }}">
                            <span class="badge bg-primary">{{ $blog->category->name }}</span>
                        </a>
                    </div>
                </div>
                <p class="lh-md">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>

    <section class="container">
        <div class="mx-auto col-md-12 col-lg-8">
            @auth
                <x-comment-form :blog="$blog" />
            @endauth

        </div>
    </section>

    <x-comments :comments="$blog->comments()->latest()->paginate(3)" />

    {{-- <x-subscribe /> --}}

    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />
</x-layout>
