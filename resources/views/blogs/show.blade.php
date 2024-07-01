@props(['blog', 'randomBlogs'])

<x-layout>
    <!-- single blog detail section -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mx-auto pt-4">
                <a class="btn btn-primary text-decoration-none" href="{{ session('preUrl') }}">Back</a>
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <div class="d-flex align-items-start justify-content-start">
                    <div class="d-flex items-center">
                        <div>
                            <img src="{{ $blog->author->avatar }}" class="rounded-circle" width="50" height="50"
                                alt="">
                        </div>
                        <div class="ms-3 d-flex align-items-start flex-column">
                            <h6>
                                <a class="text-decoration-none text-black" href="/user/{{ $blog->author->username }}">
                                    {{ $blog->author->name }}
                                </a>
                            </h6>
                            <p class="text-secondary ms-0">
                                {{ $blog->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                    <div class="tags ms-3">
                        <a class="text-decoration-none" href="/categories/{{ $blog->category->slug }}">
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
        <div class="col-md-12 col-lg-8 mx-auto">
            @auth
                <x-comment-form :blog="$blog" />
            @endauth

        </div>
    </section>

    <x-comments :blog="$blog" />

    <x-subscribe />

    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />
</x-layout>
