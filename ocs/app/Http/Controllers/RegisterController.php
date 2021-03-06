<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => ['required'],
            'password' => ['required', 'min:6'],
            'email' => ['required', 'email', 'unique:users'],
            'address' => ['required']
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'address' => $request->address

        ]);
    }
}
