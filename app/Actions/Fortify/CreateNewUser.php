<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Notifications\ReferralBonus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    protected function registered(Request  $request, $user)
{
    if ($user->referrer !== null) {
        Notification::send($user->referrer, new ReferralBonus($user));
    }

}

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
            'username' => ['required',
            Rule::unique(User::class),
        ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

    $referrer = User::whereUsername(session()->pull('referrer'))->first();
        return User::create([
            'referrer_id' => $referrer ? $referrer->id : null,
            'username'    => $input['username'],
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        Notification::send($referrer, new ReferralBonus($user));
    }
}
