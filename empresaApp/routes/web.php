<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('empleados', \App\Http\Controllers\EmpleadoController::class);

Route::resource('departamentos', \App\Http\Controllers\DepartamentoController::class);

Route::resource('puestos', \App\Http\Controllers\PuestoTrabajoController::class);

Route::resource('imagens', \App\Http\Controllers\ImagenController::class);