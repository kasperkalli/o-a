<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\PlatosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'login']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/mesas', [MesasController::class, 'index'])->name('mesas.index');

Route::get('/menu', [PlatosController::class, 'index'])->name('platos.index');
Route::post('/menu', [PlatosController::class, 'store'])->name('platos.store');
