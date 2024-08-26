<div>
    @foreach ($books as $book)
        <ul class="py-3 text-white rounded bg-secondary">
            <li>{{ $book->author }}</li>
            <li>{{ $book->email }}</li>
            <li>{{ $book->price }}</li>
            <li>{{ $book->level }}</li>
            <a href="{{ route('books.show', $book) }}" class="btn btn-primary btn-sm">See more</a>
        </ul>
        <hr />
    @endforeach
</div>
