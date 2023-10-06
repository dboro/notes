<?php

namespace App\Exceptions;

class SignInException extends \Exception
{
    public function __construct(string $message, protected string $errorField)
    {
        parent::__construct($message);
    }

    public function render(): mixed
    {
        return response([
            'message' => $this->message,
            'errors' => [
                $this->errorField => [$this->message]
            ]
        ], 422);
    }
}
