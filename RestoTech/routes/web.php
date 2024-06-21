<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\PlatosController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\CheckRoleadmin;

//uinlloged
Route::get('/', [HomeController::class, 'unlogged']) -> name("/");
Route::get('/login', [UserController::class, 'loginview']) -> name("login");
Route::get('/register', [UserController::class, 'registerview']) -> name("register");
Route::post('/logging-in', [UserController::class, 'login'])  -> name("logging-in");
Route::post('/registering', [UserController::class, 'register'])  -> name("registering");


Route::group(['middleware' => CheckRole::class] , function(){

    //normal user
    Route::get('/home', [HomeController::class, 'index']) -> name("home");
    Route::get('/mesas', [MesasController::class, 'index']) -> name("mesas");
    //Route::get('/platos/{id}', [PlatosController::class, 'show']) -> name("platos.show");
    //Route::get('/mesas/{id}', [MesasController::class, 'show']) -> name("mesas.show");
    
    Route::post('/selfedit', [UserController::class, 'selfedit']) -> name("self.edit");

    //todos los usuarios
    Route::get('/logout', [UserController::class, 'logout']) -> name("logout");
});

Route::group(['middleware' => CheckRole::class] , function(){
    //ver/editar platos
    Route::get('/platos', [PlatosController::class, 'index']) -> name("platos");
    Route::post('/platoStore', [PlatosController::class, 'store']) -> name("platos.store");

    //listar/editar usuarios
    Route::get('/usuarios', [AdminController::class, 'listUsers']) ->name("usuarios");
    Route::post('/usuarioStore', [AdminController::class, 'storeUsers']) -> name("usuarios.store");
    Route::post('/usuarioEdit', [AdminController::class, 'editUsers']) -> name("usuarios.edit");
    Route::delete('/usuarioDelete', [AdminController::class, 'deleteUsers']) -> name("usuario.delete");
    
    //todos los usuarios
    Route::get('/logout', [UserController::class, 'logout']) -> name("logout");
        
});