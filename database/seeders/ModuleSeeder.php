<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('modules')->insert([
            'name' => 'carnet',
            'icon' => '/../../public/assets/Unibague_logo.jpg',
            'visible' => true,
        ]);

        DB::table('modules')->insert([
            'name' => 'appSiga',
            'icon' => '/../../public/assets/Unibague_logo.jpg',
            'visible' => true,
        ]);

        DB::table('modules')->insert([
            'name' => 'carnetScaner',
            'icon' => '/../../public/assets/Unibague_logo.jpg',
            'visible' => false,
        ]);

        DB::table('modules')->insert([
            'name' => 'adminPanel',
            'icon' => '/../../public/assets/Unibague_logo.jpg',
            'visible' => false,
        ]);
    }
}
