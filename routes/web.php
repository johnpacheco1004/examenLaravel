<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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
Route::get('/', [PagesController::class, 'fnIndex'] ) ->name('xIndex');
Route::post('/', [PagesController::class, 'fnRegistrar'] ) ->name('Estudiante1.xRegistrar');
Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdate'] ) ->name('Estudiante1.xUpdate');
Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizar'])->name('Estudiante1.xActualizar');
Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminar'])->name('Estudiante1.xEliminar');
Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle'])->name('Estudiante1.xDetalle');
Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria'])->where('numero', '[0-9]+')->name('xGaleria');
Route::get('/curso',[PagesController::class, 'fnLista'] )->name('xLista');

