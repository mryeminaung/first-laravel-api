<x-layout>

    <x-slot name="title">
        <title>{{ strtolower(implode(' ', explode('-', $post->slug))) }}</title>
    </x-slot>

    <x-slot name="content">
        <div>
            <div class="flex items-center gap-x-2">
                <h3 class="text-xl font-bold">
                    {{ $post->title }} {{ $post->id }}
                </h3>
                <button onclick="window.location.href = '{{ route('posts.edit', $post) }}';"
                    class="rounded-md bg-slate-300 px-2 p-1">
                    Edit
                </button>

                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-md bg-slate-300 px-2 p-1">Delete</button>
                </form>

            </div>
            <p>{{ $post->body }}</p>
            <a href="/posts" class="rounded-md bg-slate-400 p-2 my-2 inline-flex text-center">Back to Home</a>
        </div>
    </x-slot>

</x-layout>
