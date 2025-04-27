<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CategoryController;

Route::get('/', [ContentController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::get('/authors/{author}', [AuthorController::class, 'show']);
Route::get('/authors/{author}/edit', [AuthorController::class, 'edit']);
Route::put('/authors/{author}', [AuthorController::class, 'update']);
Route::delete('/authors/{author}', [AuthorController::class, 'destroy']);

Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/create', [GenreController::class, 'create']);
Route::post('/genres', [GenreController::class, 'store']);
Route::get('/genres/{genre}', [GenreController::class, 'show']);
Route::get('/genres/{genre}/edit', [GenreController::class, 'edit']);
Route::put('/genres/{genre}', [GenreController::class, 'update']);
Route::delete('/genres/{genre}', [GenreController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

Route::get('/contents', [ContentController::class, 'index']);
Route::get('/contents/create', [ContentController::class, 'create']);
Route::post('/contents', [ContentController::class, 'store']);
Route::get('/contents/{content}', [ContentController::class, 'show']);
Route::get('/contents/{content}/edit', [ContentController::class, 'edit']);
Route::put('/contents/{content}', [ContentController::class, 'update']);
Route::delete('/contents/{content}', [ContentController::class, 'destroy']);
