<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\TipoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::resource('tipo',TipoController::class);
Route::post('gasto',[GastosController::class,'store']);
Route::post('search', [TipoController::class, 'searchByDate']);
Route::get('gasto/tipo',[TipoController::class, 'listaUser']);

Route::get('mostrar',[TipoController::class, 'mostrar']);