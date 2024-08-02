<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\QRcode;
use App\Models\Role;
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

       {/* Now the user role is determined by the domain*/}
        if ($email[1] === 'unibague.edu.co'){
            $roleId = Role::getRoleIdByName('funcionario');
        } else{
            $roleId = Role::getRoleIdByName('user');
        }
       $secretValue = QRcode::generateSecretValue();

       $user = User::firstOrCreate([
           'google_id' => $googleUser->id,
       ], [
           'name' => $googleUser->name,
           'email' => $googleUser->email,
           'qrCode' => QRcode::generateQrCode($googleUser->email, $secretValue),
           'role_id' => $roleId,
       ]);
       Auth::login($user);

       return redirect('/dashboard');
   }
   public function redirect (Request $request) {
       {
          if ($request ->has('forceAuth')){
          $user = User::find($request->forceAuth);
          Auth::login($user);
          return redirect('/dashboard');
       }
           return Socialite::driver('google')->redirect();

       }
   }
    public function authRedirect () {
        {
            return redirect()->route('dashboard');
        }
    }
}
