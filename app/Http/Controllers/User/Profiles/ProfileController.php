<?php

namespace App\Http\Controllers\User\Profiles;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $user->load('posts');
        return view('user.show', compact('user'));
    }

    /**
     * Display the authenticated user's profile.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function myProfile()
    {
        return redirect()->route('profile.show', auth()->user()->username);
    }
}
