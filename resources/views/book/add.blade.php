@extends('book.home')

@section('title')
    <title>Add new book</title>
@endsection

@section('content')
    <form class="rounded border border-1 w-50 my-3 mx-auto p-4 bg-white" method="POST" action="{{ route('books.store') }}">
        @csrf
        @method('post')

        {{-- @if ($errors->any())
            <div class="mb-3">
                <ul class="list-inside">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </ul>
            </div>
        @endif --}}

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control @error('author')
                is-invalid
            @enderror"
                value="{{ old('author') }}" name="author" id="author" />
            @error('author')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control  @error('email')
                is-invalid
            @enderror"
                value="{{ old('email') }}" name="email" id="email" />
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control  @error('price')
                is-invalid
            @enderror"
                value="{{ old('price') }}" name="price" id="price" />
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <input class="form-check-input 
                value="{{ old('isStock') }}" type="checkbox" id="isStock"
                value="1" checked name="isStock">
            <label class="form-check-label" for="isStock">
                Available in Stock
            </label>
            <br />
            @error('isStock')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <select name="level" class="form-select mb-3">
            <option selected disabled>Select level</option>
            <option {{ old('level') === 'easy' ?? 'selected' }} value="easy">Easy</option>
            <option {{ old('level') === 'medium' ?? 'selected' }} value="medium">Medium</option>
            <option {{ old('level') === 'hard' ?? 'selected' }} value="hard">Hard</option>
        </select>
        @error('level')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
