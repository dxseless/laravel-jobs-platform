<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class RegisteredUserController extends Controller
{
    public function create () 
    {
        return view('auth.register');
    }

    public function store () 
    {
        $attributes = request()->validate([
            'name' => 'required',
            'age' => ['numeric'],
            'email' => ['email', 'required'],
            'password' => ['required', 'confirmed'],
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/');
    }
}
