<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('roleChecker');
    // }

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $formData = $request->validated();
        $user = User::create($formData);

        return redirect('/login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/blogs')->with('success', 'Good bye');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function post_login(LoginRequest $request)
    {
        $formData = $request->validated();

        // check email first and then check password, work BTS
        if (auth()->attempt($formData)) {
            return redirect('/blogs')->with('success', 'Welcome Back');
        } else {
            return redirect()->back()->withErrors(['email' => 'Email went wrong!', 'password' => 'Somethig went wrong!']);
        }
    }
}
