<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AccountSettingUpdateRequest;
use App\Models\User;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    public function __construct(private ProfileService $profileService)
    {
    }

    public function show(User $user)
    {
        $user->load('posts');
        return view('user.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $this->profileService->delete($user);
        return redirect()->back();
    }
}
