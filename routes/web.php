<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\LampController::class, 'index'])->name('lmap.index'); 

//update lamps
Route::post('/lamps/{id}', [App\Http\Controllers\LampController::class, 'updatelamp'])->name('lamp.update');

//Histories
Route::get('/histories', [App\Http\Controllers\HistoryController::class, 'index'])->name('histories.index');