<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.blogs', [
            'blogs' => auth()->user()->blogs->sortByDesc('created_at'),
        ]);
    }

    public function create()
    {
        return view('blogs.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(BlogStoreRequest $request)
    {
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->user()->id;
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');

        Blog::create($attributes);

        return to_route('blogs.index');
    }
}
