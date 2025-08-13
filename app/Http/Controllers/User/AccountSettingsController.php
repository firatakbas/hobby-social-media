<?php

namespace App\Http\Controllers\User;

use App\Contracts\Repositories\ProfileRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AccountSettingUpdateRequest;

class AccountSettingsController extends Controller
{
    public function __construct(private ProfileRepositoryInterface $profileRepository)
    {}

    public function edit()
    {
        $user = $this->profileRepository->authUser();
        return view('user.settings', compact('user'));
    }

    public function update(AccountSettingUpdateRequest $request)
    {
        $this->profileRepository->update($request->validated());
        return redirect()->back()->with('success', 'Bilgiler başarıyla güncellendi');
    }
}
