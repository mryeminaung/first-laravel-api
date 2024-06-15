<!-- default slot -->
{{-- </x-slot> --}}

<!-- hero section -->
{{-- <x-hero /> --}}

<!-- blogs section -->
{{-- <x-blogs-section :blogs="$blogs" /> --}}

<!-- subscribe new blogs -->
{{-- <x-subscribe /> --}}

<x-layout>

    <x-slot name="title">
        Blogs
    </x-slot>

    @foreach ($blogs as $blog)
        <div>
            <h3>
                <a class="" href="/blogs/{{ $blog->id }}">
                    {{ $blog->title }}
                </a>
            </h3>
            <div>
                <p>
                    published at -
                    {{ $blog->created_at->diffForHumans() }}
                </p>
                <p>
                    {{ $blog->intro }}
                </p>
            </div>
        </div>
    @endforeach
</x-layout>

{{-- @extends('blogs.home')

@section('title')
    <title>All Blogs</title>
@endsection

@section('content')
   @foreach ($blogs as $blog)
        <div>
            <h3>
                <a class="" href="/blogs/{{ $blog->id }}">
                    {{ $blog->title }}
                </a>
            </h3>
            <div>
                <p>
                    published at -
                    {{ $blog->created_at->diffForHumans() }}
                </p>
                <p>
                    {{ $blog->intro }}
                </p>
            </div>
        </div>
    @endforeach
@endsection --}}
