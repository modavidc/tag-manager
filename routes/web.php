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
Route::get('/', [App\Http\Controllers\TagController::class, 'index']);
Route::get('tags', [App\Http\Controllers\TagController::class, 'index']);
Route::get('tags/{tag}', [App\Http\Controllers\TagController::class, 'edit']);
Route::put('tags/{tag}', [App\Http\Controllers\TagController::class, 'update']);
Route::post('tags', [App\Http\Controllers\TagController::class, 'store']);
Route::delete('tags/{tag}', [App\Http\Controllers\TagController::class, 'destroy']);