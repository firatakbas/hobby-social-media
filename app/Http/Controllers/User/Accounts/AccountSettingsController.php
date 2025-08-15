<?php

namespace App\Http\Controllers\User\Accounts;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\AccountSettingUpdateRequest;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;

class AccountSettingsController extends Controller
{
    public function __construct(private ProfileService $service)
    {
    }

    public function edit()
    {
        $user = Auth::user();
        return view('settings.account', compact('user'));
    }

    public function update(AccountSettingUpdateRequest $request)
    {
        $user = Auth::user();
        $this->service->update($request->validated(), $user);
        return redirect()->back()->with('success', 'Bilgiler başarıyla güncellendi');
    }
}
