<?php

namespace App\Services;

use App\Contracts\Repositories\ProfileRepositoryInterface;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileService
{

    public function __construct(private ProfileRepositoryInterface $profileRepository)
    {
    }

    public function update(array $data, User $user)
    {
        return $this->profileRepository->update($data, $user);
    }

    public function updateProfileImage(UploadedFile $photo, User $user)
    {
        if ($user->profile?->profile_image) {
            Storage::disk('public')->delete($user->profile->profile_image);
        }

        $path = $photo->store('profile', 'public');

        return $this->profileRepository->updateProfileImage($path, $user);
    }

    public function updateProfile(array $data, User $user)
    {
        return $this->profileRepository->updateProfile($data, $user);
    }
}
