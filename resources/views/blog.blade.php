@extends('app.blogLayout')

@section('title')
<title>Blog Detail for {{$blog->id}}</title>
@endsection

@section('content')
<article>
    <h2>{{$blog->title}}</h2>
    <h3>{{$blog->intro}}</h3>
    <p>{{$blog->body}}</p>
    <a href="/blogs">Go Back</a>
</article>
@endsection
