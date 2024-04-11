@extends('book.home')

@section('title')
    <title>All books</title>
@endsection

@section('content')
    <div class="m-4">
        <a href="/books/add" class="btn btn-primary btn-sm">Add new book</a>
        <div class="p-3 bg-white rounded mt-3">
            @foreach ($books as $book)
                <ul class="bg-secondary rounded text-white py-3">
                    <li>{{ $book->author }}</li>
                    <li>{{ $book->email }}</li>
                    <li>{{ $book->price }}</li>
                    <li>{{ $book->level }}</li>
                    <a href="/books/{{ $book->book_id }}/detail" class="btn btn-primary btn-sm">See more</a>

                </ul>
                <hr />
            @endforeach
        </div>
    </div>
@endsection
