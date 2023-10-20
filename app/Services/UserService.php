<?php
namespace App\Services;

use App\Repositories\UserRepository;
use Auth, Hash;

class UserService {
    public function __construct(public UserRepository $repository) {}
    public function registerUser($attributes)
    {
        $attributes['password'] = Hash::make($attributes['password']);
        $user = $this->repository->create($attributes);
        Auth::login($user);
        return $user;
    }

    public function updateProfile($attributes)
    {
        $this->repository->update($attributes);
    }
}