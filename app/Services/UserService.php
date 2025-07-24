<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{

    public function __construct(private UserRepository $userRepository)
    {
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['username'] = Str::slug($data['username'], '');
            $data['password'] = Hash::make($data['password']);


            if (User::where('username', $data['username'])->exists()) {
                throw new \Exception('Bu kullanıcı adı zaten alınmış. Lütfen farklı bir kullanıcı adı deneyin.');
            }

            $data['display_name'] = $data['first_name'].' '.$data['last_name'];

            $user = $this->userRepository->create($data);
            $user->profile()->create();

            Auth::login($user);
            return $user;
        });
    }

    public function update(array $data, User $user)
    {
        $data['username'] = Str::slug($data['username'], '');

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        else {
            unset($data['password']);
        }

        return $this->userRepository->update($data, $user);
    }

    public function delete(User $user)
    {
        return $this->userRepository->delete($user);
    }
}
