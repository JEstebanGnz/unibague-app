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
            'icon' => '/Images/carnet.svg',
            'visible' => true,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/carnet"}'
        ]);

        Module::create([
            'name' => 'SIGA',
            'icon' => '/Images/SIGA.svg',
            'visible' => true,
            'type' => 'ExternalComplexRedirect',
            'payload' => '{"IOSLink":"https://siga.unibague.edu.co/sgacampus/","AndroidLink":"https://siga.unibague.edu.co/sgacampus/","DefaultLink":"https://siga.unibague.edu.co/sgacampus/"}'
        ]);

        Module::create([
            'name' => 'Scaner',
            'icon' => '/Images/qrcode.svg',
            'visible' => false,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/scanner"}'
        ]);

        Module::create([
            'name' => 'Ajustes',
            'icon' => '/Images/config.svg',
            'visible' => false,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/users"}'

        ]);

        Module::create([
            'name' => 'Carnet',
            'icon' => '/Images/carnet.svg',
            'visible' => true,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/carnet"}'
        ]);

        Module::create([
            'name' => 'SIGA',
            'icon' => '/Images/SIGA.svg',
            'visible' => true,
            'type' => 'ExternalComplexRedirect',
            'payload' => '{"IOSLink":"https://siga.unibague.edu.co/sgacampus/","AndroidLink":"https://siga.unibague.edu.co/sgacampus/","DefaultLink":"https://siga.unibague.edu.co/sgacampus/"}'
        ]);

        Module::create([
            'name' => 'Scaner',
            'icon' => '/Images/qrcode.svg',
            'visible' => false,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/scanner"}'
        ]);

        Module::create([
            'name' => 'Ajustes',
            'icon' => '/Images/config.svg',
            'visible' => false,
            'type' => 'InternalRedirect',
            'payload' => '{"link":"/users"}'

        ]);

    }
}
