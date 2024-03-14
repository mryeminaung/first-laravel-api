<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);

        Session::put('pre_url', request()->fullUrl());

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validated();
        $validateData = validator(request()->all(), [
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required'
        ]);

        if ($validateData) {
            Post::create([
                'title' => $request->title,
                'slug' => str_replace(' ', '-', $request->slug),
                'body' => $request->body
            ]);
            return redirect(route('posts.index'))->with('success', 'Product Created Succesffully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.detail', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'slug' => str_replace(' ', '-', $request->slug),
            'body' => $request->body,
        ]);

        return redirect(route('posts.show', ['post' => $post]))->with('success', 'Product Updated Succesffully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // dd($post);
        $post->delete();
        return redirect(route('posts.index'))->with('success', 'Product Deleted Succesffully');
    }
}
