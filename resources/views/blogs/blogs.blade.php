{{-- <x-layout>
    <!-- hero section -->
    <x-hero />

    <!-- blogs section -->
    <x-blogs-section :blogs="$blogs" />

    <!-- subscribe new blogs -->
    <x-subscribe />

</x-layout> --}}

@extends('blogs.home')

@section('title')
    <title>All Blogs</title>
@endsection

@section('content')
    @foreach ($blogs as $blog)
        <article>
            <h1 class="text-2xl font-bold">
                <a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a>
            </h1>
            <p>{{ $blog->intro }}</p>
            <div>
                <p>
                    {{ $blog->body }}
                </p>
            </div>
        </article>
    @endforeach
@endsection
