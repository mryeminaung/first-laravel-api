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

        <div class="shadow-md border p-2 rounded-md">
            {{ $posts->links() }}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 my-10">
            @foreach ($posts as $post)
                <div class="bg-slate-200 rounded-md p-2 relative">
                    <img src="{{ $post->image_url }}" alt="" class="w-full rounded-md">
                    <h3 class="text-xl font-bold my-2 truncate-2-lines overflow-hidden">{{ $post->title }}</h3>
                    <p class="absolute p-1.5 -top-3 right-2 bg-red-500 rounded-full px-3">{{ $post->id }}</p>
                    <p class="truncate-line text-ellipsis overflow-hidden">
                        {{ $post->body }}</p>
                    <a href="/posts/{{ $post->slug }}"
                        class="rounded-md bg-slate-400 p-2 my-2 inline-flex text-center">
                        View Detail
                    </a>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-layout>
