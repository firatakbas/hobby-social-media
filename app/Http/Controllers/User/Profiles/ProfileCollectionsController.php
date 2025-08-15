<?php

namespace App\Http\Controllers\User\Profiles;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileCollectionsController extends Controller
{
    public function index(User $user)
    {
        // Kullanıcının koleksiyonlarını yükleyebilirsiniz
        // $user->load('collections');
        return view('profile.collections', compact('user'));
    }
}
