<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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

Route::get('/login/google/callback', [\App\Http\Controllers\AuthController::class,'googleAuth']);
Route::get('/', [\App\Http\Controllers\AuthController::class, 'redirect'] )->name('inicio');
Route::get('/users/byToken', [\App\Http\Controllers\UserController::class,'getUserByToken']);
//Route::get('/carnet',[\App\Http\Controllers\UserController::class,'getUserByToken']);
Route::get('/carnet', [\App\Http\Controllers\CarnetController::class,'carnetView'])->middleware(['auth'])->name('carnet');
Route::get('/ajustes', [\App\Http\Controllers\AdminPannelController::class, 'adminPannelView'])->middleware(['auth'])->name('ajustes');
Route::get('/scanner', [\App\Http\Controllers\ScannerController::class,'scannerView'] )->middleware(['auth'])->name('scanner');

Route::resource('roles', \App\Http\Controllers\RoleController::class)->middleware(['auth']);
Route::resource('users', \App\Http\Controllers\UserController::class)->middleware(['auth']);
Route::resource('permissions', \App\Http\Controllers\PermissionController::class)->middleware(['auth']);
Route::resource('modules', \App\Http\Controllers\ModuleController::class)->middleware(['auth']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth'])->name('dashboard');
