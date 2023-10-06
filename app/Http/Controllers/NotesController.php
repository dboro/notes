<?php

namespace App\Http\Controllers;

use App\Dto\Notes\UpdateDto;
use App\Http\Requests\Notes\DeleteNoteRequest;
use App\Http\Requests\Notes\GetByIdNoteRequest;
use App\Http\Requests\Notes\StoreNoteRequest;
use App\Http\Requests\Notes\UpdateNoteRequest;
use App\NotesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function Laravel\Prompts\note;

class NotesController extends Controller
{
    /**
     * @param Request $request
     * @param NotesService $service
     * @return JsonResponse
     */
    public function getAll(Request $request, NotesService $service): JsonResponse
    {
        return new JsonResponse([
            'data' => $service->getAll($request->user()->id)
        ]);
    }

    /**
     * @param GetByIdNoteRequest $request
     * @param NotesService $service
     * @return JsonResponse
     */
    public function getById(GetByIdNoteRequest $request, NotesService $service): JsonResponse
    {
        return new JsonResponse([
            'data' => $service->getById($request->route('id'))
        ]);
    }

    /**
     * @param StoreNoteRequest $request
     * @param NotesService $service
     * @return JsonResponse
     */
    public function store(StoreNoteRequest $request, NotesService $service): JsonResponse
    {
        return new JsonResponse([
            'data' => $service->store($request->getDto())
        ]);
    }

    /**
     * @param UpdateNoteRequest $request
     * @param NotesService $service
     * @return JsonResponse
     */
    public function update(UpdateNoteRequest $request, NotesService $service): JsonResponse
    {
        return new JsonResponse([
            'data' => $service->update($request->getDto())
        ]);
    }

    /**
     * @param DeleteNoteRequest $request
     * @param NotesService $service
     * @return JsonResponse
     */
    public function delete(DeleteNoteRequest $request, NotesService $service)
    {
        return new JsonResponse([
            'data' => $service->delete($request->route('id'))
        ]);
    }
}
