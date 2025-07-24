<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function index()
    {
        $users = $this->userService->all();

        return view('welcome', compact('users'));
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $this->userService->create($request->validated());
            return redirect()->route('home.index')->with('success', 'Kaydınız başarıyla oluşturuldu.');
        }
        catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.settings', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $this->userService->update($request->validated(), $user);
        return redirect()->back()->with('success', 'Bilgiler başarıyla güncellendi');
    }

    public function destroy(User $user)
    {
        $this->userService->delete($user);
        return redirect()->back();
    }

    public function registerForm(): View
    {
        return view('auth.register');
    }
}
