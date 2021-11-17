<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Http\Requests\Contracts\CreateUserModelInterface;
use App\Models\User;

interface UserRepositoryInterface
{
    public function create(CreateUserModelInterface $createUserModel): User;
}
