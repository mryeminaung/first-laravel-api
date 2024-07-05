<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\collection\CollectionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\student\StudentController;
use App\Models\Category;
use App\Models\Comment;
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

// Creative Coder Myanmar Blog Tutorial 

Route::get('/', function () {
    return redirect('/blogs');
});

Route::get('/blogs', [BlogController::class, 'index']);

// find post not by id, use just slug
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

Route::get('/categories/{category:slug}', function (Category $category) {
    session(['preUrl' => request()->fullUrl() . '#blogs']);

    return view('blogs.index', [
        'blogs' => $category->blogs->load('author', 'category'),
        'categories' => Category::all(),
        'currentCategory' => $category->name
    ]);
});

Route::get('/user/{user:username}', function (User $user) {
    return view('blogs.index', [
        'blogs' => $user->blogs->load('author', 'category'),
        'categories' => Category::all()
    ]);
});

// comment system
Route::post("/blogs/{blog:slug}/comments", [CommentController::class, 'store']);

// register and login

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');

// use middleware to protect routes from un-authorized request

Route::middleware('roleChecker')->group(function () {
    Route::get('/role-checker');
});

Route::get('/panel/admin-panel', function () {
    dd("Welcome back, Admin!");
});

Route::get('/panel/guest-panel', function () {
    dd("Welcome back, Guest!");
});


// Route::get('/panel/admin-panel', function () {
//     dd("Welcome back, Admin!");
// })->middleware('roleChecker');

// Route::get('/panel/guest-panel', function () {
//     dd("Welcome back, Guest!");
// })->middleware('roleChecker');

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
