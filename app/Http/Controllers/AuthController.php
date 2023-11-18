<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Inertia\Inertia;

class AuthController extends Controller
{
   public function googleAuth (){
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

       $user = User::firstOrCreate([
           'google_id' => $googleUser->id,
       ], [
           'name' => $googleUser->name,
           'email' => $googleUser->email,
           'qrCode' => User::generateQrCode($googleUser->email),
           'role_id' => 1,
       ]);
       Auth::login($user);

       return redirect('/dashboard');
   }
   public function redirect () {
       {
           return Socialite::driver('google')->redirect();
       }
   }
}
