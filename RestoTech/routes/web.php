<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\PlatosController;
use App\Http\Middleware\Middleware;


Route::get('/', [HomeController::class, 'unlogged']) -> name("/");


Route::get('/home', [HomeController::class, 'index']) -> middleware(Middleware::class)-> name("home");
Route::get('/login', [UserController::class, 'loginview']) -> name("login");
Route::get('/register', [UserController::class, 'registerview']) -> name("register");
Route::get('/mesas', [MesasController::class, 'index']) -> middleware(Middleware::class)-> name("mesas");
Route::get('/platos', [PlatosController::class, 'index']) -> middleware(Middleware::class)-> name("platos");
//Route::get('/platos/{id}', [PlatosController::class, 'show']) -> name("platos.show");
//Route::get('/mesas/{id}', [MesasController::class, 'show']) -> name("mesas.show");

Route::post('/platoStore', [PlatosController::class, 'store']) -> middleware(Middleware::class)-> name("platos.store");

Route::post('/logging-in', [UserController::class, 'login'])  -> name("logging-in");
Route::post('/registering', [UserController::class, 'register'])  -> name("registering");
Route::get('/logout', [UserController::class, 'logout'])-> middleware(Middleware::class) -> name("logout");