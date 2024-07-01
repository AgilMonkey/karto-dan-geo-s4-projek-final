<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }  

    public function store()
    {
        // Validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Attempt login
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Email salah.',
                'password' => 'Password salah.'
            ]);
        }

        // Regenerate token
        request()->session()->regenerate();

        // Redirect
        return redirect('/home');
    }
}