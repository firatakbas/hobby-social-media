<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\User\AccountPasswordController;
use App\Http\Controllers\User\AccountSettingsController;
use App\Http\Controllers\User\ProfileCollectionsController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ProfileFriendsController;
use App\Http\Controllers\User\ProfileGroupsController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/**
 * Genel Sayfa - Herkese açık
 */
Route::get('/', [HomeController::class, 'index'])->name('home.index');

/**
 * Auth Olmamış Kullanıcılar (Guest) için route grubu
 */
Route::middleware('guest')->group(function () {
    // Kayıt formu
    Route::get('/register', [AuthController::class, 'create'])->name('register.create');
    // Kayıt işlemi
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');

    // Giriş formu
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    // Giriş işlemi
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
});

/**
 * Giriş yapmış kullanıcılar (Auth) için route grubu
 */
Route::middleware('auth')->group(function () {

    // Kullanıcı ayarlar
    Route::prefix('account')->group(function () {
        // Kullanıcı hesap düzenleme formu
        Route::get('/edit', [AccountSettingsController::class, 'edit'])->name('account.edit');

        // Kullanıcı bilgilerini güncelleme
        Route::put('/update', [AccountSettingsController::class, 'update'])->name('account.update');

        // Şifre sıfırlama
        Route::get('/password/reset', [AccountPasswordController::class, 'edit'])->name('account-password.edit');
        Route::put('/password/change', [AccountPasswordController::class, 'update'])->name('account-password.update');
    });


    // Çıkış işlemi
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Post işlemleri
    Route::prefix('posts')->group(function () {
        // Post oluşturma sayfası
        Route::get('/new', [PostController::class, 'index'])->name('posts.index');
        // Yeni post oluşturma
        Route::post('/store/user', [PostController::class, 'storeUser'])->name('post.store.user');
        Route::post('/store/group', [PostController::class, 'storeGroup'])->name('post.store.group');
        // Post silme
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('post.destroy');
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

Route::prefix('profile/{user:username}')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/groups', [ProfileGroupsController::class, 'index'])->name('profile.groups');

    Route::get('/friends', [ProfileFriendsController::class, 'index'])->name('profile.friends');

    Route::get('/collections', [ProfileCollectionsController::class, 'index'])->name('profile.collections');
});
