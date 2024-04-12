@extends('book.home')

@section('title')
    <title>All books</title>
@endsection

@section('content')
    <div class="m-4">
        <a href="/books/add" class="btn btn-primary btn-sm">Add new book</a>
        <div class="p-3 bg-white rounded mt-3">
            @include('book.subView')
        </div>
    </div>
@endsection
