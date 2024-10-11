<?php

use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;


// Rota para listar projetos usando Livewire
Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');

// Rota para exibir um projeto específico
Route::get('/projects/{project}', [ProjectsController::class, 'show'])->name('projects.show');
