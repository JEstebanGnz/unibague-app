<?php

use App\Jobs\UpdateUsersQRcodeJob;
use App\Models\Event;
use App\Models\QRcode;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
Route::post('/users/byToken', [\App\Http\Controllers\UserController::class,'getUserByToken']);
Route::get('/carnet', [\App\Http\Controllers\CarnetController::class,'carnetView'])->middleware(['auth'])->name('carnet');
Route::get('/scanner', [\App\Http\Controllers\ScannerController::class,'scannerView'] )->middleware(['auth'])->middleware('can:isScanner')->name('scanner');
Route::get('/data', [\App\Http\Controllers\DataController::class,'userInfo'] )->middleware(['auth'])->name('personalInfo');
Route::resource('roles', \App\Http\Controllers\RoleController::class)->middleware(['auth'])->middleware('can:isAdmin');
Route::get('/user/role', [\App\Http\Controllers\UserController::class,'getUserRole'] )->middleware(['auth'])->name('user.role');
Route::resource('users', \App\Http\Controllers\UserController::class)->middleware(['auth'])->middleware('can:isAdmin');
Route::get('/allUsers', [\App\Http\Controllers\UserController::class,'allUsers'])->name('api.users.index');

Route::resource('modules', \App\Http\Controllers\ModuleController::class)->middleware(['auth'])->middleware('can:isAdmin');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class,'dashboardView'])->middleware(['auth'])->name('dashboard');

Route::get('/logout', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'destroy'] )->name('logout');

Route::get('testEncrypt', function (){
    $users = \App\Models\User::where('email','=','juan.gonzalez10@unibague.edu.co')->get();
    $secretValue = QRcode::generateSecretValue();
    QRcode::updateUsersQRcode($users, $secretValue);
});

Route::get('/test', function(){
      $secretKey = Env('SECRET_KEY');
      $input = 'juan.gonzalez10@unibague.edu.co';
    $output = '';
    $inputLength = strlen($input);
    $keyLength = strlen($secretKey);

    for ($i = 0; $i < $inputLength; $i++) {
        $output .= $input[$i] ^ $secretKey[$i % $keyLength];
    }
    dd(base64_encode($output));
});

Route::inertia('/eventos', 'Events/Index')->middleware(['auth'])->middleware('can:isAdmin');

Route::get('/events/user', [\App\Http\Controllers\EventController::class, 'getUserEvents'])->name('events.user');

Route::get('/events/{eventId}/report', [\App\Http\Controllers\EventController::class, 'getUserEvents'])->name('events.report');

Route::resource('events', \App\Http\Controllers\EventController::class,
    [  'as' => 'api']);


