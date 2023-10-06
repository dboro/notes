<?php

namespace App\Dto\Auth;

use App\Dto\ToArray;

class SignUpDto
{
    use ToArray;

    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ){
    }
}
