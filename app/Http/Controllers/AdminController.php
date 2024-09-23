<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $blogs = User::find(auth()->user()->id)->blogs()->latest()->paginate(5);

        return view('admin.blogs.index', [
            'blogs' => $blogs,
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(BlogStoreRequest $request)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = auth()->user()->id;

        if ($request->file('thumbnail')) {
            $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Blog::create($attributes);

        return to_route('admin.blogs');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = auth()->user()->id;

        if ($request->file('thumbnail')) {
            $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            $attributes['thumbnail'] = $blog->thumbnail;
        }

        $blog->update($attributes);

        return to_route('admin.blogs');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return to_route('admin.blogs');
    }
}
