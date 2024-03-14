<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\student\StudentController;
use App\Models\Blog;
use App\Models\Category;
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
    return view('blogs.blogs', [
        "blogs" => Blog::all()
    ]);
});

// find post not by id, use just slug
Route::get('/blogs/{blog:slug}', function (Blog $blog) {

    // $path = __DIR__ . "/../resources/ids/$blog.html";
    // if (!file_exists($path)) {
    //     // abort(404);
    //     return redirect("/");
    // }

    // $blog = file_get_contents($path);
    // if (!$blog) {
    // return redirect("/blogs");
    // }
    return view('blogs.blog', ["blog" => $blog]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs.blogs', ['blogs' => $category->blogs]);
});

// --------------------------------------------------------------- 

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{student}/delete', [StudentController::class, 'destroy']);
