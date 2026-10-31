<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PortfolioController;

Route::get('/', PortfolioController::class)->name('home');

// Route::inertia('/', 'home')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});


Route::resource('projects', ProjectController::class)->except(['show']);

require __DIR__.'/settings.php';
