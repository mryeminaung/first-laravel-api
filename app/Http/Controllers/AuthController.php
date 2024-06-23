<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        dd($request->all());
    }
}
