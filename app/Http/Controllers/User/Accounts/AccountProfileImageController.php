<?php

namespace App\Http\Controllers\User\Accounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\AccountProfileImageUpdateRequest;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class AccountProfileImageController extends Controller
{
    public function __construct(private ProfileService $profileService)
    {
    }

    public function edit()
    {
        $user = Auth::user();
        return view('settings.profile-image', compact('user'));
    }

    public function update(AccountProfileImageUpdateRequest $request)
    {
        $user = Auth::user();
        $this->profileService->updateProfileImage($request->file('profile_image'), $user);
        return redirect()->back()->with('success', 'Bilgiler başarıyla güncellendi');
    }
}
