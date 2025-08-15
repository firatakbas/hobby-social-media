<?php

namespace App\Contracts\Repositories;

use App\Models\User;
use Illuminate\Http\UploadedFile;

interface ProfileRepositoryInterface
{
    public function update(array $data, User $user): bool;

    public function updateProfileImage(string $path, User $user): bool;

    public function updateProfile(array $data, User $user): bool;
}
