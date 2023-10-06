<?php

namespace App;

use App\Dto\Notes\StoreDto;
use App\Dto\Notes\UpdateDto;
use App\Models\Note;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

class NotesService
{
    /**
     * @param int $userId
     * @return array
     */
    public function getAll(int $userId): array
    {
        return Note::query()->where('user_id', $userId)->get()->all();
    }

    /**
     * @param StoreDto $dto
     * @return Note|Model
     */
    public function store(StoreDto $dto): Note|Model
    {
        return Note::query()->create(
            $dto->toArray()
        );
    }

    /**
     * @param UpdateDto $dto
     * @return Model
     */
    public function update(UpdateDto $dto): Model
    {
        $note =  Note::query()->find($dto->id);
        $note->fill($dto->toArray());
        $note->save();

        return $note->refresh();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getById(int $id): Model
    {
        return Note::query()->find($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id): mixed
    {
        return Note::query()->where('id',$id)->delete();
    }
}
