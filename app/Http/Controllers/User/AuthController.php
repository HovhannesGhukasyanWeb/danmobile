<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        $user = User::create($request->only('username', 'email', 'password', 'address', 'phone_number'));
        \Auth::guard('user')->loginUsingId($user->id);
        return redirect()->to('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (!\Auth::guard('user')->attempt($credentials)) {
            return redirect()->back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        return redirect()->to('/');
    }

    public function logout()
    {
        \Auth::guard('user')->logout();
        return redirect()->to('/login');
    }
}
