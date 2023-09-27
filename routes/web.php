<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/login',"login")->name('login');
Route::view('/registro',"register")->name('registro');


Route::get('/', function () {
    //return view('clientes');
    //return view('plantilla');
    return view('login');
});

Route::post('/validar-registro',[LoginController::class,'register'])->name('validar-registro');
Route::post('/inicia-sesion',[LoginController::class,'login'])->name('iniciar-sesion');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');




Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', App\Http\Controllers\ClienteController::class);
    Route::resource('inventario', App\Http\Controllers\InventarioController::class);
    Route::resource('pedido', App\Http\Controllers\PedidosController::class);
});
