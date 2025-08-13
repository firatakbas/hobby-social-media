<?php

namespace App\Contracts\Repositories;

use App\Models\User;

interface ProfileRepositoryInterface
{
    public function all();

    public function authUser();

    public function update(array $data);

    public function updateProfile(array $data);

    public function getById(int $id);

    public function getByEmail(string $email);

    public function getByUsername(string $username);

    public function existsByUsername(string $username);
}
