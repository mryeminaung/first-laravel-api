<x-layout>

    <x-slot name="title">
        <title>{{ strtolower(implode(' ', explode('-', $post->slug))) }}</title>
    </x-slot>

    <x-slot name="content">
        <div class="w-auto lg:w-[800px] mx-auto border border-slate-300 rounded-lg overflow-hidden shadow-md relative">
            <img src="{{ $post->image_url }}" alt="{{ $post->slug }}" class="rounded-md w-full">
            <div class="p-5">
                <div class="flex items-center justify-between gap-x-2">
                    <h3 class="text-2xl font-bold">
                        {{ $post->title }} {{ $post->id }}
                    </h3>

                    <div class="flex items-center gap-x-4">
                        <button onclick="window.location.href = '{{ route('posts.edit', $post) }}';"
                            class="rounded-md text-center bg-yellow-500 px-4 p-1">
                            Edit
                        </button>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-md text-center bg-red-500 px-4 p-1">Delete</button>
                        </form>
                    </div>

                </div>
                <p class="py-2">{{ $post->body }}</p>
                <a href="/posts" class="rounded-md bg-slate-400 p-2 inline-flex text-center absolute top-3 left-2">
                    Back to Home
                </a>
            </div>
        </div>
    </x-slot>

</x-layout>
