<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterUserRequest;

class RegisteredUserController
{
    public function create() 
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request) 
    {
        $attributes = $request->validated(); 

        $attributes['password'] = bcrypt($attributes['password']); 

        $user = User::create($attributes);

        Auth::login($user); 

        return redirect('/');
    }
}