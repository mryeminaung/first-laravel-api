@extends('book.home')

@section('title')
    <title>Book {{ $book->book_id }}</title>
@endsection

@section('content')
    <div class="m-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
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
