<?php

use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;
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


Route::resource('roles', \App\Http\Controllers\RoleController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
Route::resource('modules', \App\Http\Controllers\ModuleController::class);


Route::get('/login/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('redirect');

Route::get('/login/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $email =explode ("@",$googleUser->email);
    if ($email[1] != "estudiantesunibague.edu.co" || $email[1] !="unibague.edu.co"){
        return (response("Utiliza tu correo institucional xfavor"));
    }

    $user = User::updateOrCreate([
        'google_id' => $googleUser->id,
    ], [
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'qrCode' => User::generateQrCode($googleUser->name,$googleUser->email),
        'role_id' => 1,
    ]);
    Auth::login($user);

    return redirect('/dashboard');
});

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
