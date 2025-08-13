<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProfileRepositoryInterface;
use App\Models\User;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function authUser()
    {
        return auth()->user();
    }

    public function update(array $data)
    {
        $user = auth()->user();
        return $user->update($data);
    }

    public function updateProfile(array $data)
    {
        $user = auth()->user();
        return $user->profile()->update($data);
    }

    public function getById(int $id)
    {
        return User::findOrFail($id)->first();
    }

    public function getByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function getByUsername(string $username)
    {
        return User::where('username', $username)->first();
    }

    public function existsByUsername(string $username)
    {
        return User::where('username', $username)->exists();
    }
}
