<?php

namespace App\Http\Controllers\User\Profiles;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileFriendsController extends Controller
{
    public function index(User $user)
    {
        // Kullanıcının arkadaşlarını yükleyebilirsiniz
        $user->load('friends');
        return view('profile.friends', compact('user'));
    }
}
