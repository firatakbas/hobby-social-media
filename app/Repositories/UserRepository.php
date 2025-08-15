<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function getById(int $id)
    {
        return User::findOrFail($id);
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
