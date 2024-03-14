<x-blogLayout>
    <x-slot name="title">
        <title>All Blogs</title>
    </x-slot>
    <x-slot name="content">
        {{-- {{$blogs->links()}} --}}
        <div class="flex flex-col p-5 px-3 justify-center items-start gap-6 bg-white rounded-md">
            @foreach ($blogs as $blog)
                <div class="p-3 rounded-md h-auto w-full shadow-md border bg-slate-100 relative">
                    <article>
                        <h2 class="text-2xl font-bold">{{ $blog->title }}</h2>
                        <span
                            class="bg-slate-300 px-2 py-1 top-3 rounded-md absolute right-3">{{ $blog->category->name }}
                        </span>

                        {{-- <h2 class="text-xl font-bold">{!!$blog->title!!}</h2> --}}
                        {{-- {!! !!} this will not escape html syntax --}}
                        <h4><span class="font-bold text-xs">Published at :</span>
                            {{ $blog->updated_at->diffForHumans() }}</h4>
                        <p class="py-2">{{ $blog->body }}</p>

                        <a href="/blogs/{{ $blog->slug }}"
                            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View
                            Detail</a>

                    </article>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-blogLayout>
