<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
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
            if (auth()->user()->is_admin) {
                return to_route('admin.blogs')->with('success', 'Welcome Back');
            } else {
                return to_route('blogs.index')->with('success', 'Welcome Back');
            }
        } else {
            return back()->withErrors(['email' => 'Email went wrong!', 'password' => 'Somethig went wrong!']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return to_route('blogs.index')->with('success', 'Good bye');
    }
}
