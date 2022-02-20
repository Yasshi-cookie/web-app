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

Route::get('/', [App\Http\Controllers\TopController::class, 'index'])->name('top');
Route::get('/rational', [App\Http\Controllers\RationalController::class, 'index'])->name('rational');
Route::post('/rational', [App\Http\Controllers\RationalController::class, 'post'])->name('rational');
Route::get('/symmetric_group', [App\Http\Controllers\SymmetricGroupController::class, 'index'])->name('symmetric_group');
