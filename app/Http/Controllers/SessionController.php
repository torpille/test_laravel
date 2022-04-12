<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'Welcome back!');
        }
        return back()->withInput()->withErrors(['password' => 'Wrong password. Try again']);
    }

}
