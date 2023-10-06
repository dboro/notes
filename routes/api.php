<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
   Route::get('/notes', [NotesController::class, 'getAll'])->name('notes');

   Route::get('/notes/{id}', [NotesController::class, 'getById'])->name('notes.get-by-id');

   Route::post('/notes', [NotesController::class, 'store'])->name('notes.store');

   Route::put('/notes/{id}', [NotesController::class, 'update'])->name('notes.update');

    Route::delete('/notes/{id}', [NotesController::class, 'delete'])->name('notes.delete');

});

Route::post('sign-in', [AuthController::class, 'signIn']);

Route::post('sign-up', [AuthController::class, 'signUp']);
