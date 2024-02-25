@extends('app.blogLayout')

@section('title')
<title>All Blogs</title>
@endsection

@section('content')
@foreach($blogs as $blog)
<article>
    <h2>{{$blog->title}}</h2>
    <h3>{{$blog->intro}}</h3>
    <h4>Published at : {{$blog->created_at->diffForHumans()}}</h4>
    <p>{{$blog->body}}</p>
    <a href="/blogs/{{$blog->id}}">View Detail</a>
</article>
<hr />
@endforeach
@endsection
