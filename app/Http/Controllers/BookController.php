<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Book::inRandomOrder()->take(4)->get()
        return view('book.books', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|min:5',
            'email' => 'required|email|unique:books,email',
            'price' => 'required|numeric',
            'isStock' => 'required|boolean',
            'level' => 'required|alpha',
        ], [
            'author.min' => 'Give at least five characters for author',
            'email.unique' => 'duplicate entry!'
        ]);

        $book = new Book;

        $book->author = $request->author;
        $book->email = $request->email;
        $book->price = $request->price;
        $book->isStock = $request->has('isStock');
        $book->level = $request->level;

        $book->save();

        return to_route('books.detail', ['book' => $book->book_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.book', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->author = $request->author;
        $book->email = $request->email;
        $book->price = $request->price;
        $book->isStock = $request->has('isStock');
        $book->level = $request->level;

        $book->save();

        return redirect()->route('books.detail', ['book' => $book]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }
}
