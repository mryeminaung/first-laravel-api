<?php

use App\Http\Controllers\collection\CollectionController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\student\StudentController;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/posts', [PostsController::class, 'index']);

// Route::get('/posts/{post}', [PostsController::class, 'show']);

// Route::post('/posts', [PostsController::class, 'store']);

// Route::match(['put', 'patch'], '/posts/{id}', [PostsController::class, 'update']);

// Route::delete('/posts/{post}', [PostsController::class, 'destroy']);

// Route::get('/posts', 'App\Http\Controllers\PostsController@index');

// ---------------------------------------------------------------

Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');

// show creat form
Route::get('/create', [PostsController::class, 'create'])->name('posts.create');

// create post
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

// show edit form 
Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');

// edit post
Route::match(['put', 'patch'], '/posts/{post}', [PostsController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}/destroy', [PostsController::class, 'destroy'])->name('posts.destroy');

// --------------------------------------------------------------- 

Route::get('/', function () {
    return view('blogs.blogs', ['blogs' => Blog::all()]);
});

// find post not by id, use just slug
Route::get('/blogs/{slug}', function ($slug) {
    return view('blogs.blog', ['blog' => Blog::find($slug)]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs.blogs', ['blogs' => $category->blogs]);
});

// --------------------------------------------------------------- 

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students/create', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::match(['put', 'patch'], '/students/{student}/update', [StudentController::class, 'update'])->name('students.update');
Route::get('/students/{student}/delete', [StudentController::class, 'destroy'])->name('students.destroy');

/* Collection testing */

// Route::get('/', [CollectionController::class, 'index']);

// revision on CRUD

Route::get('/books', function () {
    // Book::inRandomOrder()->take(4)->get()
    return view('book.books', ['books' => Book::all()]);
})->name('books.books');

Route::get('/books/{book}/detail', function (Book $book) {
    return view('book.book', ['book' => $book]);
})->name('books.detail');

Route::get('/books/{book}/delete', function (Book $book) {
    $book->delete();

    return redirect('/books');
});

Route::get('/books/add', function () {
    return view('book.add');
})->name('books.add');

Route::post('/books/store', function (Request $request) {

    $book = new Book;

    $book->author = $request->author;
    $book->email = $request->email;
    $book->price = $request->price;
    $book->isStock = $request->has('isStock');
    $book->level = $request->level;

    $book->save();

    return redirect('/books');
})->name('books.store');

Route::get('/books/{book}/edit', function (Book $book) {
    return view('book.edit', ['book' => $book]);
})->name('books.edit');

Route::match(['put', 'patch'], '/books/{book}/update', function (Request $request, Book $book) {

    $book->author = $request->author;
    $book->email = $request->email;
    $book->price = $request->price;
    $book->isStock = $request->has('isStock');
    $book->level = $request->level;

    $book->save();

    return redirect('/books');
})->name('books.update');
