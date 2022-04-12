<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy() {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }

    public function create() {
        return view("sessions.create");
    }

    public function store() {
        $attributes = request()->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required|',
            ]);
        if ( ! auth()->attempt($attributes)) {
            throw ValidationException::withMessages(['password' => 'Wrong password. Try again']);
        }
        session()->regenerate();
        return redirect('/')->with('success', 'Welcome back!');
    }

}
