<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class VerifiedSessionController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home.index');
        } else {
            return redirect()->back()->with('error', 'Yanlış kullanıcı adı veya şifre');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate(); // mevcut session'ı iptal et
        session()->regenerateToken(); // CSRF güvenliği için token yenile

        return redirect()->route('home.index');
    }
}
