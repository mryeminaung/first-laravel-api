<x-blogLayout>
    <x-slot name="title">
        <title>All Blogs</title>
    </x-slot>
    <x-slot name="content">
        {{-- {{$blogs->links()}} --}}
        <div class="flex flex-col p-5 px-20 justify-center items-start gap-6 bg-white rounded-md">
            @foreach ($blogs as $blog)
                <div class="p-3 rounded-md h-auto w-full shadow-md border bg-slate-100 relative">
                    <article>
                        <h2 class="text-3xl font-bold">{{ $blog->title }}</h2>
                        <span
                            class="bg-slate-400 p-2 top-3 rounzzded-md absolute right-3">{{ $blog->category->name }}</span>
                        {{-- <h2 class="text-xl font-bold">{!!$blog->title!!}</h2> --}}
                        {{-- {!! !!} this will not escape html syntax --}}
                        <h4><span class="font-bold">Published at :</span> {{ $blog->created_at->diffForHumans() }}</h4>
                        <p>{{ $blog->body }}</p>
                        <a class="bg-slate-500 text-white p-2 rounded-md block mt-3 w-[100px]"
                            href="/blogs/{{ $blog->slug }}">View Detail</a>
                    </article>
                </div>
            @endforeach
        </div>
    </x-slot>
</x-blogLayout>
