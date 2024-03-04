<x-layout>

    <x-slot name="title">
        <title>{{ strtolower(implode(' ', explode('-', $post->slug))) }}</title>
    </x-slot>

    <x-slot name="content">
        <div>
            <h3 class="text-xl font-bold">{{ $post->title }} {{ $post->id }}</h3>
            <p>{{ $post->body }}</p>
            <a href="/posts" class="rounded-md bg-slate-400 p-2 my-2 inline-flex text-center">Back to Home</a>
        </div>
    </x-slot>

</x-layout>
