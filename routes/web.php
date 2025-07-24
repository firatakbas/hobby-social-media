<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VerifiedSessionController;

/**
 * Genel Sayfa - Herkese açık
 */
Route::get('/', [HomeController::class, 'index'])->name('home.index');

/**
 * Auth Olmamış Kullanıcılar (Guest) için route grubu
 */
Route::middleware('guest')->group(function () {
    // Kayıt formu
    Route::get('/register', [UserController::class, 'registerForm'])->name('register.form');
    // Kayıt işlemi
    Route::post('/register', [UserController::class, 'store'])->name('register.store');

    // Giriş formu
    Route::get('/login', [VerifiedSessionController::class, 'loginForm'])->name('login.form');
    // Giriş işlemi
    Route::post('/login', [VerifiedSessionController::class, 'login'])->name('login.process');
});

/**
 * Giriş yapmış kullanıcılar (Auth) için route grubu
 */
Route::middleware('auth')->group(function () {
    // Kullanıcı hesap düzenleme formu
    Route::get('/accounts/edit', [UserController::class, 'edit'])->name('user.edit');
    // Kullanıcı bilgilerini güncelleme
    Route::put('/accounts/{user}', [UserController::class, 'update'])->name('user.update');

    // Çıkış işlemi
    Route::post('/logout', [VerifiedSessionController::class, 'logout'])->name('logout');

    // Post işlemleri
    Route::prefix('posts')->name('post.')->group(function () {
        // Yeni post oluşturma
        Route::post('/', [PostController::class, 'storeForUser'])->name('store.user');
        // Post silme
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
    });
});

/**
 * Herkese açık Post detay sayfası
 */
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');

/**
 * Kullanıcı profil sayfası - username ile erişim
 * Bu route en sonda tanımlanmalı, aksi takdirde diğer route'ları etkileyebilir.
 */
Route::get('/{user:username}', [UserController::class, 'show'])->name('user.show');
