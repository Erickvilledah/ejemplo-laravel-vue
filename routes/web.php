<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::get('alumnos', [AlumnosController::class, 'index'])
    ->middleware('auth:sanctum')
    ->name('alumnos');

Route::get('examples', [AlumnosController::class, 'create'])
    ->middleware('auth:sanctum')
    ->name('examples');

Route::get('shows', [AlumnosController::class, 'show'])
    ->middleware('auth:sanctum')
    ->name('shows');