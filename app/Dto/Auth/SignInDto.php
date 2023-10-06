<?php

namespace App\Dto\Auth;

class SignInDto
{
    public function __construct(
        public string $email,
        public string $password
    ){
    }
}
