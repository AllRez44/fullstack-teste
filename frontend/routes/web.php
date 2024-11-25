<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', [ProdutoController::class, 'showProdutos'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::controller(ProdutoController::class)
    ->middleware(['auth', 'verified'])
    ->prefix('produto')
    ->group( function() {
        Route::get('create', 'createProduto')
            ->name('produto.create');;
        Route::post('create', 'storeProduto')
            ->name('produto.create.store');
        Route::get('update/{id}', 'updateProduto')
            ->name('produto.update');
        Route::post('update/{id}', 'storeProduto')
            ->name('produto.update.store');

    });

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
