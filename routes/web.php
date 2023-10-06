<?php

use App\Models\User;
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


Route::get('/login/google/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();
    } catch (\Laravel\Socialite\Two\InvalidStateException $e){
        return redirect()->route('inicio');
    }
    $email =explode ("@",$googleUser->email);

    if (!str_contains($email[1],'unibague.edu.co'))
    {
        return Inertia::render('Error');
    }

    $user = User::updateOrCreate([
        'google_id' => $googleUser->id,
    ], [
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'qrCode' => User::generateQrCode($googleUser->email),
        'role_id' => 1,
    ]);
    Auth::login($user);

    return redirect('/dashboard');
});

Route::get('/', function () {
    return Socialite::driver('google')->redirect();
})->name('inicio');

Route::get('/users/byToken', [\App\Http\Controllers\UserController::class,'getUserByToken']);

Route::resource('roles', \App\Http\Controllers\RoleController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
Route::resource('modules', \App\Http\Controllers\ModuleController::class);

Route::get('/carnet', function () {
    $user = User::find(1); // Obtén el usuario que deseas usar
    $email = $user->email;

    $json = \File::get('C:\laragon\www\api\json1.json');
    $data = json_decode($json);

    return Inertia::render('CarnetContainer', [
        'qrCode' => $user->qrCode,
        'data' => $data,
    ]);
})->name('carnet');

Route::get('/ajustes', function () {
    return Inertia::render('AdminPannel');
})->name('ajustes');

Route::get('/scanner', function () {

    return Inertia::render('Scanner');
})->name('scanner');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
