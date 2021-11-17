<?php

declare(strict_types=1);

namespace App\Http\Requests\Contracts;

interface CreateUserModelInterface
{
    public function getName(): string;

    public function getEmail(): string;

    public function getUserPassword(): string;
}
