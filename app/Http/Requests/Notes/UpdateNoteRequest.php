<?php

namespace App\Http\Requests\Notes;

use App\Dto\Notes\UpdateDto;
use App\Models\Note;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Note::query()
            ->where('id', $this->route('id'))
            ->where('user_id', $this->user()->id)
            ->exists();
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

    public function getDto(): UpdateDto
    {
        $data = $this->validated();

        return new UpdateDto(
            $this->route('id'),
            $data['title'],
            $data['content'],
        );
    }
}
