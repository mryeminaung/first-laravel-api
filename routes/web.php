<?php

use App\Http\Controllers\AuthSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
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
    return to_route('blog.index');
});

Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/user/{user:username}', [UserController::class, 'show'])->name('user.blogs');

// Route::resource('blogs', BlogController::class);

// comment system
Route::post("/blogs/{blog}/comments", [CommentController::class, 'store'])->name('comments.store');

// subscribe system
Route::post('/blogs/{blog}/subscriptions', [
    SubscriptionController::class,
    'subscriptionHandler'
])->name('blogs.subscriptions');

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'create')->middleware('guest')->name('register.create');
    Route::post('/register', 'store')->middleware('guest')->name('register.store');
});

Route::controller(AuthSessionController::class)->group(function () {
    Route::post('/logout', 'logout')->middleware('auth');
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
Route::resource('books', BookController::class);
