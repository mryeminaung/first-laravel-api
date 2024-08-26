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
        <ul class="py-3 text-white rounded bg-secondary">
            <li>{{ $book->author }}</li>
            <li>{{ $book->email }}</li>
            <li>{{ $book->price }}</li>
            <li>{{ $book->level }}</li>
            <button form="delete-book" class="btn btn-primary btn-sm">Delete</button>
            <a href="{{ route('books.edit', $book) }}" class="btn btn-primary btn-sm">Edit</a>
        </ul>
        <form id="delete-book" action="{{ route('books.destroy', $book) }}" method="post">
            @csrf
            @method('delete')
        </form>
    </div>
@endsection
