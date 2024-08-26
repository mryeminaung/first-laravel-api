@extends('book.home')

@section('title')
    <title>All books</title>
@endsection

@section('content')
    <div class="m-4">
        <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">Add new book</a>
        @if (session('add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('add') }}</strong>
            </div>
        @endif
        <div class="p-3 mt-3 bg-white rounded">
            @include('book.subView')
        </div>
    </div>
@endsection
