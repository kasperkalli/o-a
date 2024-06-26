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
Route::get('/', [HomeController::class, 'unlogged'])->name("/");
Route::get('/login', [UserController::class, 'loginview'])->name("login");
Route::get('/register', [UserController::class, 'registerview'])->name("register");
Route::post('/logging-in', [UserController::class, 'login'])->name("logging-in");
Route::post('/registering', [UserController::class, 'register'])->name("registering");



//logged customer
Route::get('/home', [HomeController::class, 'index'])->middleware(CheckRole::class)->name("home");
Route::get('/platoslist', [PlatosController::class, 'list'])->middleware(CheckRole::class)->name("platos.list");
Route::get('/mesaslist', [MesasController::class, 'list'])->middleware(CheckRole::class)->name("mesas.list");
Route::post('/mesasupdate', [MesasController::class, 'update'])->middleware(CheckRole::class)->name("mesas.update");
//api like routes
//Route::get('/platos/{id}', [PlatosController::class, 'show']) -> name("platos.show");
//Route::get('/mesas/{id}', [MesasController::class, 'show']) -> name("mesas.show");

Route::get('/selfedit', [UserController::class, 'selfedit'])->middleware(CheckRole::class)->name("self.edit");
Route::post('/selfeditstore', [UserController::class, 'selfeditsstore'])->middleware(CheckRole::class)->name("self.edit.store");



//logged admin
Route::get('/admin', [AdminController::class, 'index'])->middleware(CheckRoleadmin::class)->name("admin");

Route::get('/mesas', [MesasController::class, 'index'])->middleware(CheckRoleadmin::class)->name("mesas");
Route::post('/mesas', [MesasController::class, 'store'])->middleware(CheckRoleadmin::class)->name("mesas.store");
Route::delete('/mesas', [MesasController::class, 'delete'])->middleware(CheckRoleadmin::class)->name("mesas.delete");

Route::get('/platos', [PlatosController::class, 'index'])->middleware(CheckRoleadmin::class)->name("platos");
Route::post('/platoStore', [PlatosController::class, 'store'])->middleware(CheckRoleadmin::class)->name("platos.store");
Route::get('/platoEdit', [PlatosController::class, 'find'])->middleware(CheckRoleadmin::class)->name("platos.edit");
Route::post('/platoShow', [PlatosController::class, 'show'])->middleware(CheckRoleadmin::class)->name("platos.show");
Route::delete('/platoDelete', [PlatosController::class, 'delete'])->middleware(CheckRoleadmin::class)->name("platos.delete");
//listar/editar usuarios
Route::get('/usuarios', [AdminController::class, 'listUsers'])->middleware(CheckRoleadmin::class)->name("usuarios");
Route::post('/usuarioStore', [AdminController::class, 'storeUsers'])->middleware(CheckRoleadmin::class)->name("usuarios.store");
Route::get('/usuarioEdit', [AdminController::class, 'editUsers'])->middleware(CheckRoleadmin::class)->name("usuarios.edit");
Route::post('/usuarioEdit', [AdminController::class, 'editUsersstore'])->middleware(CheckRoleadmin::class)->name("usuarios.edit.store");
Route::delete('/usuarioDelete', [AdminController::class, 'deleteUsers'])->middleware(CheckRoleadmin::class)->name("usuario.delete");

Route::get('/platosEscogidosupdate', [PlatosController::class, 'addchosenPlatos'])->middleware(CheckRoleadmin::class)->name("platos.add.escogidos");
Route::post('/platosEscodigosStore', [PlatosController::class, 'chosenPlatosStore'])->middleware(CheckRoleadmin::class)->name("platos.escogidos.store");

//all users
Route::get('/logout', [UserController::class, 'logout'])->middleware(CheckRole::class)->name("logout");
