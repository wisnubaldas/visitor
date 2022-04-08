<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/pintu-masuk', [App\Http\Controllers\Api\AlatController::class, 'pintu_masuk']);
Route::post('/pintu-keluar', [App\Http\Controllers\Api\AlatController::class, 'pintu_keluar']);
Route::get('/cek-ruangan', [App\Http\Controllers\Api\AlatController::class, 'cek_ruangan']);

