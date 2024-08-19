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

// Creative Coder Myanmar Blog Tutorial 
Route::get('/', function () {
    return redirect('/blogs');
});

Route::get('/blogs', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

// comment system
Route::post("/blogs/{blog:slug}/comments", [CommentController::class, 'store']);

Route::get('/categories/{category:slug}', function (Category $category) {

    session(['preUrl' => request()->fullUrl() . '#blogs']);

    return view('blogs.index', [
        'blogs' => $category->blogs()->with('category', 'author')->paginate(6),
        'categories' => Category::all(),
        'currentCategory' => $category->name
    ]);
});

Route::get('/user/{user:username}', function (User $user) {

    session(['preUrl' => request()->fullUrl() . '#blogs']);

    return view('blogs.index', [
        'blogs' => $user->blogs()->with('category', 'author')->paginate(3),
        'categories' => Category::all()
    ]);
});

// register and login

Route::group(['controller' => AuthController::class], function () {

    Route::get('/register', 'create')->middleware('guest');
    Route::post('/register', 'store')->middleware('guest');

    Route::post('/logout', 'logout')->middleware('auth');

    Route::get('/login', 'login')->middleware('guest');
    Route::post('/login', 'post_login')->middleware('guest');
});

// use middleware to protect routes from un-authorized requests

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
Route::resource('posts', PostsController::class);

Route::resource("students", StudentController::class);

/* revision on CRUD */
Route::resource('books', BookController::class);


/* Collection testing */

// Route::get('/', [CollectionController::class, 'index']);

/* Revision on Routes */

Route::get('/users', function () {
    return view('collection.home');
})->name('user.index');
