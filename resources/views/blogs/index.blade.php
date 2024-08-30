@props(['blogs', 'categories', 'currentCategory'])

<x-layout>

    @if (session('success'))
        <div class="text-center alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('message'))
        <div class="text-center alert alert-danger" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <!-- hero section -->
    <x-hero />

    <!-- blogs section -->
    <x-blogs-section :blogs="$blogs" :categories="$categories" :currentCategory="$currentCategory ?? null" />

    <!-- subscribe new blogs -->
    {{-- <x-subscribe /> --}}

</x-layout>
