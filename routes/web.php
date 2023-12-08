<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\ProductoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tipo',[TipoController::class, 'index']);
Route::post('/tipo',[TipoController::class, 'store']);
Route::get('/producto',[ProductoController::class, 'index']);
Route::post('/producto',[ProductoController::class, 'store']);
Route::get('/venta/{id}',[ProductoController::class, 'showProductoVenta']);
Route::post('/venta/{id}',[ProductoController::class, 'venta']);