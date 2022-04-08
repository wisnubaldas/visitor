<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
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

// @include_once('admin_web.php');

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
Route::get('/detail-pintu/{id_alat}', [App\Http\Controllers\Admin\DashboardController::class,'detail_pintu'])->name('detail_pintu');

