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

        {{ $posts->links() }}

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 xxl:grid-cols-4 gap-5 my-10">
            @foreach ($posts as $post)
                <div class="bg-slate-200 rounded-md p-2 relative">
                    <h3 class="text-xl font-bold my-2 truncate-2-lines overflow-hidden">{{ $post->title }}</h3>
                    <p class="absolute p-1.5 -top-3 right-2 bg-red-500 text-white rounded-full px-3">
                        {{-- {{ $post->category->name }} --}}
                    </p>
                    <p class="truncate-line text-ellipsis overflow-hidden">
                        {{ $post->body }}</p>
                    <a href="/posts/{{ $post->slug }}"
                        class="inline-flex mt-3 items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-layout>
