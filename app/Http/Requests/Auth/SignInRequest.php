<?php

namespace App\Http\Requests\Auth;

use App\Dto\Auth\SignInDto;
use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ];
    }

    public function getDto(): SignInDto
    {
        $data = $this->validated();

        return new SignInDto(
            $data['email'],
            $data['password']
        );
    }
}
