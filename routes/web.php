<?php

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

Route::get("/", function () {
    return view('welcome');
});

Route::get('/blogs', function () {
    return view('blogs', [
        "blogs" => Blog::all()
    ]);
});

Route::get('/blogs/{blog}', function (Blog $blog) {
    // $path = __DIR__ . "/../resources/ids/$blog.html";
    // if (!file_exists($path)) {
    //     // abort(404);
    //     return redirect("/");
    // }

    // $blog = file_get_contents($path);
    if (!Blog::find($blog)) {
        return redirect("/blogs");
    }
    return view('blog', ["blog" => $blog]);
});
