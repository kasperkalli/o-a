<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\PlatosController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\CheckRoleadmin;

//unlogged
Route::get('/', [HomeController::class, 'unlogged']) -> name("/");
Route::get('/login', [UserController::class, 'loginview']) -> name("login");
Route::get('/register', [UserController::class, 'registerview']) -> name("register");
Route::post('/logging-in', [UserController::class, 'login'])  -> name("logging-in");
Route::post('/registering', [UserController::class, 'register'])  -> name("registering");


Route::get('/home', [HomeController::class, 'index']) -> middleware(CheckRole::class) -> name("home");
Route::get('/mesas', [MesasController::class, 'index']) -> middleware(CheckRole::class) -> name("mesas");
//Route::get('/platos/{id}', [PlatosController::class, 'show']) -> name("platos.show");
//Route::get('/mesas/{id}', [MesasController::class, 'show']) -> name("mesas.show");

Route::post('/selfedit', [UserController::class, 'selfedit']) -> middleware(CheckRole::class) -> name("self.edit");

Route::get('/admin', [AdminController::class, 'index']) ->middleware(CheckRoleadmin::class) -> name("admin");
Route::get('/platos', [PlatosController::class, 'index']) ->middleware(CheckRoleadmin::class) -> name("platos");
Route::post('/platoStore', [PlatosController::class, 'store']) ->middleware(CheckRoleadmin::class) -> name("platos.store");

//listar/editar usuarios
Route::get('/usuarios', [AdminController::class, 'listUsers']) ->middleware(CheckRoleadmin::class) ->name("usuarios");
Route::post('/usuarioStore', [AdminController::class, 'storeUsers']) ->middleware(CheckRoleadmin::class) -> name("usuarios.store");
Route::post('/usuarioEdit', [AdminController::class, 'editUsers']) ->middleware(CheckRoleadmin::class) -> name("usuarios.edit");
Route::delete('/usuarioDelete', [AdminController::class, 'deleteUsers']) ->middleware(CheckRoleadmin::class) -> name("usuario.delete");

//todos los usuarios
Route::get('/logout', [UserController::class, 'logout']) -> middleware(CheckRole::class) -> name("logout");