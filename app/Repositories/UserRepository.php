<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepository as UserRepositoryContract;
use App\Models\User;

class UserRepository implements UserRepositoryContract
{
    public function all()
    {
        return User::orderBy('id', 'desc')->get();
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(array $data, User $user)
    {
        $user->update($data);
        $user->profile()->update([
            'instagram' => $data['instagram'],
            'twitter' => $data['twitter'],
            'facebook' => $data['facebook'],
            'website_url' => $data['website_url'],
            'snapchat' => $data['snapchat'],
            'biography' => $data['biography'],
        ]);
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
}
