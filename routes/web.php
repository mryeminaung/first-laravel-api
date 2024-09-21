<?php

use App\Http\Controllers\AdminController;
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

Route::resource('blogs', BlogController::class)->except(['create', 'store', 'edit', 'update', 'show', 'destroy']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');

/* admin routes */
// use middleware to protect routes from un-authorized requests

Route::group(['controller' => AdminController::class, 'middleware' => 'admin', 'prefix' => "/admin"], function () {
    Route::get('/blogs', 'index')->name('admin.blogs');
    Route::get('/blogs/create', 'create')->name('admin.blogs.create');
    Route::post('/blogs/store', 'store')->name('admin.blogs.store');
    Route::get('/blogs/{blog:slug}/edit', 'edit')->name('admin.blogs.edit');
    Route::match(['put', 'patch'], '/blogs/{blog:slug}/update', 'update')->name('admin.blogs.update');
    Route::delete('/blogs/{blog:slug}', 'destroy')->name('admin.blogs.destroy');
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
