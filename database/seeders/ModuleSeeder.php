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
            'name' => 'carnet',
            'permission_id' => '1',
            'icon' => '/../../public/assets/Unibague_logo.jpg',
            'visible' => true,
        ]);

        Module::create([
            'name' => 'appSiga',
            'permission_id' => '2',
            'icon' => '/../../public/assets/Unibague_logo.jpg',
            'visible' => true,
        ]);

        Module::create([
            'name' => 'carnetScaner',
            'permission_id' => '3',
            'icon' => '/../../public/assets/Unibague_logo.jpg',
            'visible' => false,
        ]);

        Module::create([
            'name' => 'adminPanel',
            'permission_id' => '4',
            'icon' => '/../../public/assets/Unibague_logo.jpg',
            'visible' => false,

        ]);

    }
}
