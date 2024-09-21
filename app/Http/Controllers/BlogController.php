<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('preUrl', request()->fullUrl());

        // Blog::latest() query will be injected into the scope filter method
        return view('blogs.index', [
            'blogs' => Blog::latest()->filter(request(['search', 'category', 'username']))
                ->with('category', 'author')
                ->paginate(6)
                ->withQueryString(),
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog->load('author', 'category'),
            'randomBlogs' => Blog::inRandomOrder()
                ->take(3)
                ->with('author', 'category')->get()
        ]);
    }
}
