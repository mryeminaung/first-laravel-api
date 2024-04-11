@extends('book.home')

@section('title')
    <title>Edit book</title>
@endsection

@section('content')
    <form class="rounded border border-1 w-50 my-3 mx-auto p-4 bg-white" method="POST"
        action="{{ route('books.update', ['book' => $book]) }}">
        @csrf
        @method('put')
        @method('patch')

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ $book->author }}" required />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $book->email }}" required />
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ $book->price }}" required />
        </div>
        <div class="mb-3">
            <input class="form-check-input" type="checkbox" id="isStock" value="1" checked name="isStock"
                value="{{ $book->isStock }}">
            <label class="form-check-label" for="isStock">
                Available in Stock
            </label>
        </div>
        <select name="level" class="form-select mb-3" value="{{ $book->level }}" required>
            <option disabled>Select level</option>
            <option {{ $book->level == 'easy' ? 'selected' : '' }} value="easy">Easy</option>
            <option {{ $book->level == 'medium' ? 'selected' : '' }} value="medium">Medium</option>
            <option {{ $book->level == 'hard' ? 'selected' : '' }} value="hard">Hard</option>
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
