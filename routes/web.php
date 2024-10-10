<?php

use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

// Página inicial usando o layout welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rota para listar projetos usando Livewire
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');

// Rota para exibir um projeto específico
    Route::get('/projects/{project}', [ProjectsController::class, 'show'])->name('projects.show');
