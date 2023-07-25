<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Role::create(['name' => 'user']);
        Role::create(['name' => 'scan']);
        Role::create(['name' => 'admin']);

    }
}
