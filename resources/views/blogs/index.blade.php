@props(['blogs', 'categories', 'currentCategory'])

<x-layout>

    <div class="m-3">
        <x-alert class="btn btn-outline-primary" message="class based Alert Component" role="button" :$blogs>
            <x-slot:title>
                Title in named $slot
            </x-slot>

            {{-- <p><strong>Whoops!</strong> Default $slot</p> --}}
        </x-alert>
    </div>

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
