<?php

use App\Http\Controllers\PublicSiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicSiteController::class, 'home'])->name('home');

// {project:slug} le dice a Laravel que busque el proyecto por su columna "slug"
// en lugar de por su id. Esto se llama "route model binding".
Route::get('/proyectos/{project:slug}', [PublicSiteController::class, 'showProject'])->name('projects.show');

Route::post('/contacto', [PublicSiteController::class, 'storeContact'])->name('contact.store');
