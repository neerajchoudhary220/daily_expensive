<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequeset;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('web.auth.login');
    }

    public function login(LoginRequeset $loginRequeset)
    {
        $credentials = $loginRequeset->only('username', 'password');
        if (! Auth::attempt($credentials, $loginRequeset->get('remember'))) {
            return back()->withErrors(['email' => 'The provided credentials do not match our records. '])->withInput();
        }
        $loginRequeset->session()->regenerate();

        return redirect()->route('dashboard');

    }
}
