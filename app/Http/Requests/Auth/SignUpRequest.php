<?php

namespace App\Http\Requests\Auth;

use App\Dto\Auth\SignUpDto;
use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'string']
        ];
    }

    public function getDto(): SignUpDto
    {
        $data = $this->validated();

        return new SignUpDto(
            $data['name'],
            $data['email'],
            $data['password']
        );
    }
}
