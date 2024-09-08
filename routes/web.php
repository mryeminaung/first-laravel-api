<?php

use App\Http\Controllers\AuthSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\student\StudentController;
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
    return to_route('blogs.index');
});

Route::resource('blogs', BlogController::class)->except(['create', 'show', 'store']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');

// comment system
Route::post("/blogs/{blog}/comments", [CommentController::class, 'store'])->name('comments.store');

// subscribe system
Route::post('/blogs/{blog}/subscriptions', [
    SubscriptionController::class,
    'subscriptionHandler'
])->name('blogs.subscriptions');

Route::group(['controller' => BlogController::class, 'middleware' => 'admin'], function () {
    Route::get('/admin/blogs/create', 'create')->name('blogs.create');
    Route::post('/admin/blogs/store', 'store')->name('blogs.store');
});

Route::group(['controller' => RegisteredUserController::class, 'middleware' => 'guest'], function () {
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});

Route::controller(AuthSessionController::class)->group(function () {
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
    Route::get('/login', 'create')->middleware('guest')->name('login.create');
    Route::post('/login', 'store')->middleware('guest')->name('login.store');
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

// --------------------------------------------------------------- 

/* to define the common controller for all of the routes within the group */
// Route::resource('posts', PostsController::class);

// Route::resource("students", StudentController::class);

/* revision on CRUD */
// Route::resource('books', BookController::class);
