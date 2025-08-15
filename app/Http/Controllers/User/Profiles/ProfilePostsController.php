<?php

namespace App\Http\Controllers\User\Profiles;

use App\Http\Controllers\Controller;

class ProfilePostsController extends Controller
{
    public function index()
    {
        // Oturum açmış kullanıcının gönderilerini yükleyebilirsiniz
        $user = auth()->user();
        $user->load('posts'); // Eğer User modelinde posts ilişkisi varsa
        return view('profile.posts', compact('user'));
    }
}
