<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (\Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        throw ValidationException::withMessages([
            'email' => ['These credentials do not match our records.'],
        ])->redirectTo(route('admin.login'));
    }

    public function logout()
    {
        \Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
