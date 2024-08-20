<?php

namespace App\Http\Controllers;

use App\Mail\MarkDownMail;
use App\Mail\TestMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => 'required|min:10',
        ]);

        $subscribers = $blog->subscribers->filter(fn($subscriber) => $subscriber->id != auth()->id());

        $blog->comments()->create([
            'body' => request('body'),
            'blog_id' => $blog->id,
            'user_id' => auth()->user()->id
        ]);

        // send email by using default view
        // Mail::to(auth()->user()->email)->send(new TestMail($blog));

        // send email by using markdown syntax view
        Mail::to(auth()->user()->email)->send(new MarkDownMail($blog));

        return redirect("/blogs/$blog->slug");
    }
}
