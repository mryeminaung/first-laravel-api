<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        session(['preUrl' => request()->fullUrl() . '#blogs']);

        return view('blogs.index', [
            'blogs' => $category->blogs()->with('category', 'author')->paginate(6),
            'categories' => Category::all(),
            'currentCategory' => $category->name
        ]);
    }
}
