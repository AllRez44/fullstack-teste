<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', [ProdutoController::class, 'showProdutos'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
