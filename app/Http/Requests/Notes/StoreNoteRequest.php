<?php

namespace App\Http\Requests\Notes;

use App\Dto\Notes\StoreDto;
use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:50'],
            'content' => ['required', 'string', 'max:255'],
        ];
    }

    public function getDto(): StoreDto
    {
        $data = $this->validated();

        return new StoreDto(
            $data['title'],
            $data['content'],
            $this->user()->id
        );
    }
}
