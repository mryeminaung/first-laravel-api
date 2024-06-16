<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\collection\CollectionController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\student\StudentController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
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

Route::get('/blogs', function () {
    return view('blogs.blogs', ['blogs' => Blog::all()]);
});

// find post not by id, use just slug
Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blogs.blog', ['blog' => $blog, 'randomBlogs' => Blog::inRandomOrder()->take(3)->get()]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs.blogs', ['blogs' => $category->blogs]);
});

Route::get('/user/{user:username}', function (User $user) {
    return view('blogs.blogs', ['blogs' => $user->blogs]);
});

// --------------------------------------------------------------- 

/* to define the common controller for all of the routes within the group */

Route::controller(StudentController::class)->group(function () {
    Route::get('/students', 'index')->name('students.index');
    Route::get('/students/create', 'create')->name('students.create');
    Route::post('/students/create', 'store')->name('students.store');
    Route::get('/students/{student}', 'show')->name('students.show');
    Route::get('/students/{student}/edit', 'edit')->name('students.edit');
    Route::match(['put', 'patch'], '/students/{student}/update', 'update')->name('students.update');
    Route::get('/students/{student}/delete', 'destroy')->name('students.destroy');
});

/* Collection testing */

// Route::get('/', [CollectionController::class, 'index']);

/* revision on CRUD */

Route::controller(BookController::class)->group(
    function () {
        Route::get('/books', 'index')->name('books.books');

        Route::get('/books/{book}/detail', 'show')->name('books.detail');

        Route::get('/books/{book}/delete', 'destroy');

        Route::get('/books/add', 'create')->name('books.add');

        Route::post('/books/store', 'store')->name('books.store');

        Route::get('/books/{book}/edit', 'edit')->name('books.edit');

        Route::match(['put', 'patch'], '/books/{book}/update', 'update')->name('books.update');
    }
);

/* Revision on Routes */

Route::get('/users', function () {
    return view('collection.home');
})->name('user.index');

Route::get('/users/{id}', function (string $id) {
    echo Request()->fullUrl();
})->name('user.detail');
