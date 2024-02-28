<?php

use App\Http\Controllers\TestController;
use App\Models\Blog;
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

// just for get method
// Route::get('/test', [TestController::class, 'index']);

// for all HTTP methods
Route::resource('/test', TestController::class);

Route::get('/blogs', function () {
    return view('blogs.blogs', [
        "blogs" => Blog::paginate(3)
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
