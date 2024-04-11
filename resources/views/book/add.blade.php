@extends('book.home')

@section('title')
    <title>Add new book</title>
@endsection

@section('content')
    <form class="rounded border border-1 w-50 my-3 mx-auto p-4 bg-white" method="POST" action="{{ route('books.store') }}">
        @csrf
        @method('post')

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" id="author" required />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required />
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price" required />
        </div>
        <div class="mb-3">
            <input class="form-check-input" type="checkbox" id="isStock" value="1" checked name="isStock">
            <label class="form-check-label" for="isStock">
                Available in Stock
            </label>
        </div>
        <select name="level" class="form-select mb-3" required>
            <option selected disabled>Select level</option>
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
