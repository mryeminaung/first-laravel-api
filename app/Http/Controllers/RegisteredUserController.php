<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $formData = $request->validated();
        $formData['avatar'] = "https://i.pravatar.cc/150?u=" . rand(1, 100);

        User::create($formData);

        return to_route('login.create');
    }
}
