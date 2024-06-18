@props(['blog', 'randomBlogs'])

<x-layout>
    <!-- single blog detail section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <div>
                    <h6 class="font-bold">
                        Author -
                        <a href="/user/{{ $blog->author->username }}">
                            {{ $blog->author->name }}
                        </a>
                    </h6>
                    <span class="badge bg-primary">
                        <a class="text-white" href="/categories/{{ $blog->category->slug }}">
                            {{ $blog->category->name }}
                        </a>
                    </span>
                    <div class="text-secondary">{{ $blog->created_at->diffForHumans() }}</div>
                </div>
                <p class="lh-md">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>

    <x-subscribe />

    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />
</x-layout>
