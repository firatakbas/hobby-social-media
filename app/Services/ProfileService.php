<?php

namespace App\Services;

use App\Contracts\Repositories\ProfileRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileService
{

    public function __construct(private ProfileRepositoryInterface $profileRepository)
    {
    }

    public function all()
    {
        return $this->profileRepository->all();
    }

    public function update(array $data)
    {
        return $this->profileRepository->update($data);
    }

    public function updateProfile(array $data)
    {
        return $this->profileRepository->updateProfile($data);
    }
}
