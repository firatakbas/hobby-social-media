<?php

namespace App\Services;

use App\Contracts\Repositories\ProfileRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthService
{

    public function __construct(private ProfileRepositoryInterface $userRepository)
    {
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    /**
     * Yeni bir kullanıcı oluşturur
     *
     * @throws \Throwable
     *
     * @param array $data
     *
     * @return User
     */
    public function create(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $data['username'] = Str::slug($data['username'], '');
            $data['password'] = Hash::make($data['password']);

            // Aynı isimde kullanıcı var mı? kontrol eder varsa hata fırlatır.
            if ($this->userRepository->existsByUsername($data['username'])) {
                throw new \Exception('Bu kullanıcı adı zaten alınmış. Lütfen farklı bir kullanıcı adı deneyin.');
            }

            $data['display_name'] = $data['first_name'].' '.$data['last_name'];

            $user = $this->userRepository->create($data);
            $user->profile()->create();

            Auth::login($user);
            return $user;
        });
    }

    public function getById(int $id): User
    {
        return $this->userRepository->getById($id);
    }

    public function getByUsername(string $username)
    {
        return $this->userRepository->getByUsername($username);
    }
}
