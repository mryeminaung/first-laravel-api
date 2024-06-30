<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => 'required|min:10',
            'blog_id' => 'required',
            'user_id' => 'required'
        ]);

        $blog->comments()->create([
            'body' => request('body'),
            'blog_id' => $blog->id,
            'user_id' => auth()->user()->id
        ]);

        return back();
        // return redirect("/blogs/$blog->slug");
    }
}
