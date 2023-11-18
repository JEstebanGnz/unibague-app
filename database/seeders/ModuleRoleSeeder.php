<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Role;
use Illuminate\Database\Seeder;

class ModuleRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {

            $this->assignModuleRole(1, 1);
            $this->assignModuleRole(1, 2);

            $this->assignModuleRole(2, 1);
            $this->assignModuleRole(2, 2);
            $this->assignModuleRole(2, 3);

            $this->assignModuleRole(3, 1);
            $this->assignModuleRole(3, 2);
            $this->assignModuleRole(3, 3);
            $this->assignModuleRole(3, 4);
        }
    }

    private function assignModuleRole($roleId, $moduleId): void
    {

        $role = Role::find($roleId);
        $module = Module::find($moduleId);

        if ($role && $module) {
            $role->modules()->attach($module);
        } else {
            $this->command->error("No se pudo encontrar el rol con ID $roleId o el módulo con ID $moduleId.");
        }
    }
}
