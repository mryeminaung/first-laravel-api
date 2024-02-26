@extends('app.blogLayout')

@section('title')
<title>All Blogs</title>
@endsection

@section('content')
@foreach($blogs as $blog)
{{-- @dd($loop->odd) --}}

<div class="p-3 rounded-md shadow-md border {{$loop->odd ? 'bg-slate-300' : ''}}">
    <article>
        <h2 class="text-xl font-bold">{{$blog->title}}</h2>

        {{-- <h2 class="text-xl font-bold">{!!$blog->title!!}</h2> --}}
        {{-- {!! !!} this will not escape html syntax --}}

        <h3 class="text-xl font-bold">{{$blog->intro}}</h3>
        <h4>Published at : {{$blog->created_at->diffForHumans()}}</h4>
        <p>{{$blog->body}}</p>
        <a class="bg-slate-500 text-white p-2 rounded-md block mt-3 w-[100px]" href="/blogs/{{$blog->id}}">View Detail</a>
    </article>
</div>

@endforeach
@endsection
