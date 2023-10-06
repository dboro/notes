<?php

namespace App;

use App\Dto\Auth\SignInDto;
use App\Dto\Auth\SignUpDto;
use App\Models\User;
use App\Exceptions\SignInException;

class AuthService
{
    /**
     * @param SignInDto $dto
     * @return void
     * @throws SignInException
     */
    public function signIn(SignInDto $dto): void
    {
        if (auth()->attempt([
            'email' => $dto->email,
            'password' => $dto->password,
        ])) {
            session()->regenerate();
        } else {
            throw new SignInException(__('Wrong credentials.'), 'email');
        }
    }

    /**
     * @param SignUpDto $dto
     * @return void
     */
    public function signUp(SignUpDto $dto): void
    {
        $user = new User();
        $user->fill($dto->toArray());
        $user->email_verified_at = now();
        $user->save();

        auth()->login($user);

        session()->regenerate();
    }
}
