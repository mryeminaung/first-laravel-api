<x-blogLayout>
    <x-slot name="title">
        <title>{{ strtolower(implode(' ', explode("-", $blog->slug))) }}</title>
    </x-slot>

    <x-slot name="content">
        <div class="p-3 rounded-md shadow-sm bg-white">
            <article>
                <h2 class="text-3xl font-bold">{{$blog->title}}</h2>
                <h4>Published at : {{$blog->created_at->diffForHumans()}}</h4>
                <p>{{$blog->body}}</p>
                <a class="bg-slate-500 text-white p-2 rounded-md block mt-3 w-max" href="/blogs">Go Back</a>
            </article>
        </div>
    </x-slot>
</x-blogLayout>
