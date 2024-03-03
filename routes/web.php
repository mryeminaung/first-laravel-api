<?php

use App\Http\Controllers\PostsController;
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
    dd($category->blogs);
});
