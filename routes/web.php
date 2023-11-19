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


Route::get('/login', [\App\Http\Controllers\AuthController::class, 'redirect'] )->name('login');
Route::get('/login/google/callback', [\App\Http\Controllers\AuthController::class,'googleAuth']);
Route::get('/', [\App\Http\Controllers\AuthController::class, 'authRedirect'] )->name('inicio');
Route::get('/users/byToken', [\App\Http\Controllers\UserController::class,'getUserByToken'])->middleware(['auth']);
//Route::get('/carnet',[\App\Http\Controllers\UserController::class,'getUserByToken']);
Route::get('/carnet', [\App\Http\Controllers\CarnetController::class,'carnetView'])->middleware(['auth'])->name('carnet');
Route::get('/scanner', [\App\Http\Controllers\ScannerController::class,'scannerView'] )->middleware(['auth'])->middleware('can:isScanner')->name('scanner');
Route::get('/data', [\App\Http\Controllers\DataController::class,'userInfo'] )->middleware(['auth'])->name('personalInfo');
Route::resource('roles', \App\Http\Controllers\RoleController::class)->middleware(['auth'])->middleware('can:isAdmin');
Route::resource('users', \App\Http\Controllers\UserController::class)->middleware(['auth'])->middleware('can:isAdmin');
Route::resource('modules', \App\Http\Controllers\ModuleController::class)->middleware(['auth'])->middleware('can:isAdmin');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class,'dashboardView'])->middleware(['auth'])->name('dashboard');

Route::get('/logout', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'destroy'] )->name('logout');
