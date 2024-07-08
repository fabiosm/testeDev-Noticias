<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\NoticiasController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/noticias');
Route::resource('/noticias', NoticiasController::class)->only(['index', 'create', 'store', 'show']);
Route::resource('/categorias', CategoriasController::class)->only(['store']);