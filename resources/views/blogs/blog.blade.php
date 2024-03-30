{{-- <x-layout>
    <!-- singloe blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <p class="lh-md">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>

    <x-subscribe />

    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />

</x-layout> --}}

@extends('blogs.home')

@section('title')
    <title>Single Blog</title>
@endsection

@section('content')
    <article>
        {{ $blog }}
        {{-- <h1 class="text-2xl font-bold">
            <a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a>
        </h1>
        <p>{{ $blog->intro }}</p>
        <div>
            <p>
                {{ $blog->body }}
            </p>
        </div>
        <a href="/" class="bg-blue-500 p-2 rounded-md mt-3 inline-block">Back to home</a> --}}
    </article>
@endsection
