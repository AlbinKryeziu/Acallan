<?php

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'state' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'state' => $input['state'],
            'address' => $input['state'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'doctor_access' => [["17"]],
        ]);

        if ($user && $input['role']) {
            $user->role()->attach($input['role']);
        }
        return $user;
    }
}
