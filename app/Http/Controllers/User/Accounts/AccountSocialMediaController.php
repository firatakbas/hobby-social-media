<?php

namespace App\Http\Controllers\User\Accounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\AccountSocialMediaUpdateRequest;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class AccountSocialMediaController extends Controller
{
    public function __construct(private ProfileService $service)
    {
    }

    public function edit()
    {
        $user = Auth::user();
        return view('settings.social-media', compact('user'));
    }

    public function update(AccountSocialMediaUpdateRequest $request)
    {
        $user = Auth::user();
        $this->service->updateProfile($request->validated(), $user);
        return redirect()->back()->with('success', 'Bilgiler başarıyla güncellendi');
    }
}
