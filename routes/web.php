<?php

use App\Http\Controllers\AuthSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscriptionController;

use Illuminate\Support\Facades\Route;

// Creative Coder Myanmar Blog Tutorial 

Route::get('/', function () {
    return to_route('blogs.index');
});

/* comment system */

Route::post("/blogs/{blog}/comments", [CommentController::class, 'store'])->name('comments.store');

/* subscribe system */

Route::post('/blogs/{blog}/subscriptions', [
    SubscriptionController::class,
    'subscriptionHandler'
])->name('blogs.subscriptions');

/* blog routes */

Route::resource('blogs', BlogController::class)->except(['create', 'store', 'edit', 'show']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/blogs/{blog:slug}/edit', [BlogController::class, 'edit'])->name('blogs.edit');

/* admin routes */
// use middleware to protect routes from un-authorized requests

Route::group(['controller' => BlogController::class, 'middleware' => 'admin'], function () {
    Route::get('/admin/blogs/create', 'create')->name('blogs.create');
    Route::post('/admin/blogs/store', 'store')->name('blogs.store');
});

/* register routes */

Route::group(['controller' => RegisteredUserController::class, 'middleware' => 'guest'], function () {
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});

/* login and logout routes */

Route::controller(AuthSessionController::class)->group(function () {
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
    Route::get('/login', 'create')->middleware('guest')->name('login.create');
    Route::post('/login', 'store')->middleware('guest')->name('login.store');
});
