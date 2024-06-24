<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(RegisterRequest $request)
    {
        $formData = $request->validated();
        $user = User::create($formData);

        auth()->login($user);

        return redirect('/blogs')->with('success', 'Welcome Dear' . $user->name);
    }
}
