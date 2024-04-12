<div>
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
