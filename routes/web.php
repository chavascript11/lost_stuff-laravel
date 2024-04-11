<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjetosController;


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

Route::get('/', [ObjetosController::class, 'index'])->name('objetos');

Route::post('/loststuff', [ObjetosController::class, 'store'])->name('loststuff');

Route::get('/loststuff', [ObjetosController::class, 'index'])->name('loststuff');

Route::get('/loststuff/{id}', [ObjetosController::class, 'show'])->name('loststuff-edit');
Route::patch('/loststuff/{id}', [ObjetosController::class, 'update'])->name('loststuff-update');
Route::delete('/loststuff/{id}', [ObjetosController::class, 'destroy'])->name('loststuff-destroy');
