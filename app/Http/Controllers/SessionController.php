<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\LoginRequest;

class SessionController extends Controller
{
    public function create() 
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request) 
    {
        $attributes = $request->validated();
        
        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match',
            ]);
        }

        $request->session()->regenerate();

        return redirect('/');
    }

    public function destroy() 
    {
        Auth::logout();

        return redirect('/');
    }
}