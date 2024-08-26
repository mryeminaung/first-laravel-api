<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $formData = $request->validated();

        // check email first and then check password
        if (auth()->attempt($formData)) {
            return redirect('/blogs')->with('success', 'Welcome Back');
        } else {
            return back()->withErrors(['email' => 'Email went wrong!', 'password' => 'Somethig went wrong!']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/blogs')->with('success', 'Good bye');
    }
}
