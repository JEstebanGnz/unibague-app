<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'carnet:scanQr',
            'description'=> 'Permite abrir la camara del dispositov y escanear el codigo QR.']);

        Permission::create([
            'name' => 'adminPanel:crud_roles',
            'description'=> 'Permite asignar usuarios a roles de usuario. Aismismo, crear y eliminar roles de usuario, y asignar o eliminar permisos de los roles.']);

        Permission::create([
            'name' => 'adminPanel:crud_permissions',
            'description'=> 'Permite asignar usuarios a roles de usuario.'
        ]);

        Permission::create([
            'name' => 'modules_crud',
            'description'=> 'Permite asignar usuarios a roles de usua'
        ]);


    }
}
