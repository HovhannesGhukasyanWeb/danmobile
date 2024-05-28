<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function me()
    {
        $user = auth()->guard('user')->user();
        return view('user.me', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->guard('user')->user();
        $user->update($request->all());
        return redirect()->back();
    }
}
