<?php

use Illuminate\Foundation\Application;
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
Route::get('/index',[\App\Http\Controllers\UserController::class,'index']);
Route::get('/user/{id}',[\App\Http\Controllers\UserController::class,'show']);
Route::delete('/user/{id}',[\App\Http\Controllers\UserController::class,'delete']);
Route::patch('/user/{id}',[\App\Http\Controllers\UserController::class,'update']);
Route::post('/user/create',[\App\Http\Controllers\UserController::class,'create']);

Route::get('/users/{id}',[\App\Http\Controllers\RoleController::class,'show']);
Route::get('/users/{id}',[\App\Http\Controllers\RoleController::class,'show']);
Route::get('/users/{id}',[\App\Http\Controllers\RoleController::class,'show']);
Route::get('/users/{id}',[\App\Http\Controllers\RoleController::class,'show']);
Route::get('/users/{id}',[\App\Http\Controllers\RoleController::class,'show']);

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
