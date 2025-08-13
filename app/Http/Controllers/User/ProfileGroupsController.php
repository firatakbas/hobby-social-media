<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileGroupsController extends Controller
{
    public function index(User $user)
    {
        $user = User::with('groups')->findOrFail($user->id);
        return view('user.groups', compact('user'));
    }
}
