<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ContentController;

Route::get('/', [ContentController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'index']);
Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);
Route::get('/authors/{author}', [AuthorController::class, 'show']);
Route::get('/authors/{author}/edit', [AuthorController::class, 'edit']);
Route::put('/authors/{author}', [AuthorController::class, 'update']);