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

Route::resource('articulos_movimiento', App\Http\Controllers\Articulos_MovimientoController::class);
Route::get('imprimir1', [App\Http\Controllers\Articulos_MovimientoController::class, 'imprimir'])->name('imprimir.articulos');

Route::resource('datos_producto', App\Http\Controllers\Datos_ProductoController::class);
Route::get('imprimir2', [App\Http\Controllers\Datos_ProductoController::class, 'imprimir'])->name('imprimir.datos');

Route::resource('linea', App\Http\Controllers\LineaController::class);
Route::get('imprimir3', [App\Http\Controllers\LineaController::class, 'imprimir'])->name('imprimir.lineas');

Route::resource('sublinea', App\Http\Controllers\SublineaController::class);
Route::get('imprimir4', [App\Http\Controllers\SublineaController::class, 'imprimir'])->name('imprimir.sublineas');

Route::resource('movimiento', App\Http\Controllers\MovimientoController::class);
Route::get('imprimir5', [App\Http\Controllers\MovimientoController::class, 'imprimir'])->name('imprimir.movimientos');

