<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogStoreRequest $request)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = auth()->user()->id;

        Blog::create($attributes);

        return to_route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog->load('author', 'category'),
            'randomBlogs' => Blog::inRandomOrder()
                ->take(3)
                ->with('author', 'category')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $attributes = $request->validate();

        $blog->update($attributes);

        return to_route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return to_route('blogs.index');
    }
}
