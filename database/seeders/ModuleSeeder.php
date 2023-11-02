<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        Module::create([
            'name' => 'Carnet',
            'permission_id' => '1',
            'icon' => '/Images/carnet.svg',
            'visible' => true,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/carnet"}'
        ]);

        Module::create([
            'name' => 'SIGA',
            'permission_id' => '2',
            'icon' => '/Images/SIGA.svg',
            'visible' => true,
            'type' => 'ExternalComplexRedirect',
            'payload' => '{"IOSLink":"https://siga.unibague.edu.co/sgacampus/","AndroidLink":"https://siga.unibague.edu.co/sgacampus/","DefaultLink":"https://siga.unibague.edu.co/sgacampus/"}'
        ]);

        Module::create([
            'name' => 'Scaner',
            'permission_id' => '3',
            'icon' => '/Images/qrcode.svg',
            'visible' => false,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/scanner"}'
        ]);

        Module::create([
            'name' => 'Ajustes',
            'permission_id' => '4',
            'icon' => '/Images/config.svg',
            'visible' => false,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/users"}'

        ]);

        Module::create([
            'name' => 'Carnet',
            'permission_id' => '1',
            'icon' => '/Images/carnet.svg',
            'visible' => true,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/carnet"}'
        ]);

        Module::create([
            'name' => 'SIGA',
            'permission_id' => '2',
            'icon' => '/Images/SIGA.svg',
            'visible' => true,
            'type' => 'ExternalComplexRedirect',
            'payload' => '{"IOSLink":"https://siga.unibague.edu.co/sgacampus/","AndroidLink":"https://siga.unibague.edu.co/sgacampus/","DefaultLink":"https://siga.unibague.edu.co/sgacampus/"}'
        ]);

        Module::create([
            'name' => 'Scaner',
            'permission_id' => '3',
            'icon' => '/Images/qrcode.svg',
            'visible' => false,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/scanner"}'
        ]);

        Module::create([
            'name' => 'Ajustes',
            'permission_id' => '4',
            'icon' => '/Images/config.svg',
            'visible' => false,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/users"}'

        ]);

    }
}
