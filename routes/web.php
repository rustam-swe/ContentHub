<?php

use App\Http\Controllers\Web\AuthorController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ContentController;
use App\Http\Controllers\Web\GenreController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\RoleController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\LikeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('authors', AuthorController::class);
Route::resource('genres', GenreController::class);
Route::resource('categories', CategoryController::class);
Route::resource('contents', ContentController::class);
Route::resource('roles', RoleController::class);

Route::middleware('auth')->post('/contents/{id}/like', [LikeController::class, 'toggle'])->name('contents.like');
