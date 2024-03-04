<x-layout>

    <x-slot name="title">
        <title>All Posts</title>
    </x-slot>

    <x-slot name="content">
        @if (session()->has('success'))
            <h2 class="text-xl text-red-500 font-bold">
                {{ session('success') }}
            </h2>
        @endif
        <div class="grid grid-cols-4 gap-4">
            @foreach ($posts as $post)
                <div class="bg-slate-200 rounded-md p-2">
                    <h3 class="text-xl font-bold">{{ $post->title }} {{ $post->id }}</h3>
                    <p>{{ $post->body }}</p>
                    <a href="posts/{{ $post->slug }}" class="rounded-md bg-slate-400 p-2 my-2 inline-flex text-center">
                        View Detail
                    </a>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-layout>
