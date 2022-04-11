<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create() {
        return view("register.create");
    }

    public function store() {
        $attrs = request()->validate([
            "name"=>['required', 'max:255', 'min:3'],
            "username"=>['required', 'min:3', Rule::unique('users','username')],
            "email"=>['required', 'email', 'max:255'],
            "password"=>['required', 'max:255', 'min:6'],
        ]);
        $attrs['password'] = bcrypt($attrs['password']);

        User::create($attrs);

        session()->flash('success', 'Your account has been created');
        return redirect('/');
    }
}
