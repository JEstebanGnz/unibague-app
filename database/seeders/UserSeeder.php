<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    /*public function run(): void
    {
        $userRole = Role::where('name','=','user')->first();
        $name = 'SARA VALENTINA CUY RAMIREZ';
        $email ='2420181016@estudiantesunibague.edu.co';
        User::create([
            'name' => $name,
            'email' => $email,
            'qrCode' => User::generateQrCode($name, $email),
            'role_id' => $userRole->id,]);

    }*/
}
