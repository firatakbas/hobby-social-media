<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProfileRepositoryInterface;
use App\Models\User;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function update(array $data, User $user): bool
    {
        return $user->update($data);
    }

    public function updateProfile(array $data, User $user): bool
    {
        return $user->profile()->update($data);
    }

    public function updateProfileImage(string $path, User $user): bool
    {
        return $user->profile()->update(['profile_image' => $path]);
    }
}
