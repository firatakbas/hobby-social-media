<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\StoreRequest;
use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(private ProfileService $userService)
    {
    }

    /**
     * Kayıt formunu gösterir.
     *
     * @return View
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Yeni kullanıcı kaydeder.
     *
     * @throws \Throwable
     *
     * @param StoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            $this->userService->create($request->validated());
            return redirect()->route('home.index')->with('success', 'Kaydınız başarıyla oluşturuldu');
        } catch (\Exception $exception) {
            return back()->withInput()->with('error', $exception->getMessage());
        }
    }

    /**
     * Giriş formunu gösterir.
     *
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Kullanıcı girişini doğrular.
     *
     * @return RedirectResponse
     */
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home.index');
        }
        else {
            return redirect()->back()->with('error', 'Yanlış kullanıcı adı veya şifre');
        }
    }

    /**
     * Kullanıcının oturumunu sonlandırır
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home.index');
    }
}
