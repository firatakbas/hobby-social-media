<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\User\Accounts\AccountPasswordController;
use App\Http\Controllers\User\Accounts\AccountProfileImageController;
use App\Http\Controllers\User\Accounts\AccountSettingsController;
use App\Http\Controllers\User\Accounts\AccountSocialMediaController;
use App\Http\Controllers\User\Profiles\ProfileCollectionsController;
use App\Http\Controllers\User\Profiles\ProfileController;
use App\Http\Controllers\User\Profiles\ProfileFriendsController;
use App\Http\Controllers\User\Profiles\ProfileGroupsController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Rotaları
|--------------------------------------------------------------------------
|
| Bunlar web arayüzünüz için kaydettiğiniz rotalardır. Artık bu
| rotaların her birine 'web' middleware grubu atanmıştır. Bir şeyler inşa edin
| harika!
|
*/

// Herkese Açık ve Genel Sayfa Rotaları
Route::get('/', [HomeController::class, 'index'])->name('feed.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show'); // Herkese açık post detayı

// Kimlik Doğrulama (Authentication) Rotaları
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'create'])->name('register.create');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
});

// Kimliği Doğrulanmış Kullanıcılar İçin Rotalar
Route::middleware('auth')->group(function () {
    // Çıkış İşlemi
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Gruplar Rotaları
    Route::prefix('groups')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('groups.index');
        Route::get('/{group}', [GroupController::class, 'show'])->name('groups.show');
        Route::get('/{group}/settings', [GroupController::class, 'settings'])->name('groups.settings');
        
        // Grup post'ları için rota
        Route::post('/{group}/posts', [PostController::class, 'store'])->name('post.store.group');
    });

    // Post Rotaları
    Route::prefix('posts')->group(function () {
        //Route::get('/new', [PostController::class, 'index'])->name('posts.index');
        Route::post('/', [PostController::class, 'store'])->name('post.store.user');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    });

    // Hesap Ayarları Rotaları
    Route::prefix('account')->group(function () {
        Route::get('/edit', [AccountSettingsController::class, 'edit'])->name('account.setting.edit');
        Route::put('/update', [AccountSettingsController::class, 'update'])->name('account.setting.update');
        Route::get('/password/reset', [AccountPasswordController::class, 'edit'])->name('account.password.edit');
        Route::put('/password/', [AccountPasswordController::class, 'update'])->name('account.password.update');
        Route::get('/social-media', [AccountSocialMediaController::class, 'edit'])->name('account.social.media.edit');
        Route::put('/social-media', [AccountSocialMediaController::class, 'update'])->name('account.social.media.update');
        Route::get('/profile-image', [AccountProfileImageController::class, 'edit'])->name('account.profile.image.edit');
        Route::put('/profile-image', [AccountProfileImageController::class, 'update'])->name('account.profile.image.update');
    });

    // Kullanıcı Profil Rotaları (Kendi Profilim)
    //Route::get('/profile', [ProfileController::class, 'myProfile'])->name('profile.my');
});

// Kullanıcı Profil Rotaları (Genel - Username ile Erişim) - Bu en sonda tanımlanmalı!
Route::prefix('profile/{user:username}')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/groups', [ProfileGroupsController::class, 'index'])->name('profile.groups');
    Route::get('/friends', [ProfileFriendsController::class, 'index'])->name('profile.friends');
    Route::get('/collections', [ProfileCollectionsController::class, 'index'])->name('profile.collections');
});
