<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{

    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['username'] = Str::slug($data['username'], '');
            $data['password'] = Hash::make($data['password']);

            // Aynı isimde kullanıcı var mı? kontrol eder varsa hata fırlatır.
            if ($this->repository->existsByUsername($data['username'])) {
                throw new \Exception('Bu kullanıcı adı zaten alınmış. Lütfen farklı bir kullanıcı adı deneyin.');
            }

            $data['display_name'] = $data['first_name'].' '.$data['last_name'];

            $user = $this->repository->create($data);
            $user->profile()->create();

            Auth::login($user);
            return $user;
        });
    }
}
