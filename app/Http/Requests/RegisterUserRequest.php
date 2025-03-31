<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'age' => 'nullable|numeric',
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|confirmed|min:8', 
        ];
    }
}