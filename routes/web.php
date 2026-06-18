<?php

use App\Http\Controllers\PublicSiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicSiteController::class, 'home'])->name('home');

// {project:slug} le dice a Laravel que busque el proyecto por su columna "slug"
// en lugar de por su id. Esto se llama "route model binding".
Route::get('/proyectos/{project:slug}', [PublicSiteController::class, 'showProject'])->name('projects.show');

Route::post('/contacto', [PublicSiteController::class, 'storeContact'])->name('contact.store');

// Cotización: GET muestra el formulario (con ?plan=slug opcional), POST lo guarda.
Route::get('/cotizar', [PublicSiteController::class, 'showQuote'])->name('quote');
Route::post('/cotizar', [PublicSiteController::class, 'storeQuote'])->name('quote.store');

// SEO: mapa del sitio para buscadores
Route::get('/sitemap.xml', [PublicSiteController::class, 'sitemap'])->name('sitemap');
