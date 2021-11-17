<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Http\Requests\Contracts\CreateUserModelInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function create(CreateUserModelInterface $createUserModel): User
    {
        return User::create([
            'name' => $createUserModel->getName(),
            'email' => $createUserModel->getEmail(),
            'password' => Hash::make($createUserModel->getUserPassword())
        ]);
    }
}
