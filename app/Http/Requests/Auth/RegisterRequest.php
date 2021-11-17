<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Contracts\CreateUserModelInterface;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest implements CreateUserModelInterface
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ];
    }

    public function getName(): string
    {
        return $this->input('name');
    }

    public function getEmail(): string
    {
        return $this->input('email');
    }

    public function getUserPassword(): string
    {
        return $this->input('password');
    }
}
