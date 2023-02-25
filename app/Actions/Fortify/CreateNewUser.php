<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
            'pseudo' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'description' => ['string', 'max:255'],
            'profilImg' => ['string'],
            'bannerImg' => ['string'],
            'country' => ['string'],
            'city' => ['string'],
            'date_of_birth' => ['date'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'pseudo' => $input['pseudo'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'description' => "Ceci est une description",
            'profilImg' => "/images/profils/default-profile.png",
            'bannerImg' => "/images/banners/default-banner.png",
            'country' => "",
            'city' => "",
            'date_of_birth' => date("Y-m-d"),
        ]);
    }
}
