<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function store(BookStoreRequest $request)
    {
        $validated = $request->validated();
        $book = Book::create($validated);
        // $book = new Book;

        // $book->author = $request->author;
        // $book->email = $request->email;
        // $book->price = $request->price;
        // $book->isStock = $request->has('isStock');
        // $book->level = $request->level;
        // $book->published_at = Carbon::now();

        // $book->save();

        return to_route('books.detail', ['book' => $book->book_id])->with('success', 'Data Added Successfully');;
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
    public function update(BookUpdateRequest $request, Book $book)
    {
        $validated = $request->validated();
        $book = $book->update($validated);

        // $book->author = $request->author;
        // $book->email = $request->email;
        // $book->price = $request->price;
        // $book->isStock = $request->has('isStock');
        // $book->level = $request->level;

        // $book->save();

        return redirect()->route('books.detail', ['book' => $book])->with('success', 'Data Updated Successfully');
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
