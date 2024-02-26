@extends('app.blogLayout')

@section('title')
<title>Blog Detail for {{$blog->id}}</title>
@endsection

@section('content')
<div class="p-3 rounded-md shadow-md">
    <article>
        <h2 class="text-xl font-bold">{{$blog->title}}</h2>
        <h3 class="text-xl font-bold">{{$blog->intro}}</h3>
        <h4>Published at : {{$blog->created_at->diffForHumans()}}</h4>
        <p>{{$blog->body}}</p>
        <a class="bg-slate-500 text-white p-2 rounded-md block mt-3 w-[100px]" href="/blogs">View Detail</a>
    </article>
</div>
@endsection