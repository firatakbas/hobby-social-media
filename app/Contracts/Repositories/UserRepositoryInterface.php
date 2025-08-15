<?php

namespace App\Contracts\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data);

    public function getById(int $id);

    public function getByEmail(string $email);

    public function getByUsername(string $username);

    public function existsByUsername(string $username);
}
