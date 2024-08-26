<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        session(['preUrl' => request()->fullUrl() . '#blogs']);

        return view('blogs.index', [
            'blogs' => $user->blogs()->with('category', 'author')->paginate(3),
            'categories' => Category::all()
        ]);
    }
}
