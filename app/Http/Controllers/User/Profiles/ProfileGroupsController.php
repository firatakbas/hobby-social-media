<?php

namespace App\Http\Controllers\User\Profiles;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileGroupsController extends Controller
{
    public function index(User $user)
    {
        $user->load('groups');
        return view('user.groups', compact('user'));
    }
}
