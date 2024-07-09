@props(['blogs', 'categories', 'currentCategory'])

<x-layout>

    @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- hero section -->
    <x-hero />

    <!-- blogs section -->
    <x-blogs-section :blogs="$blogs" :categories="$categories" :currentCategory="$currentCategory ?? null" />

    <!-- subscribe new blogs -->
    <x-subscribe />

</x-layout>
