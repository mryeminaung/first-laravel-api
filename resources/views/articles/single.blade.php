@extends('app.layout')

@section('title')
<title>An article</title>
@endsection

@section('content')
<h1>Single article will go here... {{$article}}</h1>
<a href="/articles">Go back</a>
@endsection
