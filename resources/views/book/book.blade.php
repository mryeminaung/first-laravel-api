@extends('book.home')

@section('title')
    <title>Book {{ $book->book_id }}</title>
@endsection

@section('content')
    <div class="m-4">
        <ul class="bg-secondary rounded text-white py-3">
            <li>{{ $book->author }}</li>
            <li>{{ $book->email }}</li>
            <li>{{ $book->price }}</li>
            <li>{{ $book->level }}</li>
            <a href="/books/{{ $book->book_id }}/delete" class="btn btn-primary btn-sm">Delete</a>
            <a href="/books/{{ $book->book_id }}/edit" class="btn btn-primary btn-sm">Edit</a>
        </ul>
    </div>
@endsection
