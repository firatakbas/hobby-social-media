<?php

namespace App\Contracts\Repositories;

use App\Models\User;

interface UserRepository
{
    public function all();

    public function create(array $data);

    public function update(array $data, User $user);

    public function delete(User $user);
}
