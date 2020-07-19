<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'product manage']);
        Permission::create(['name' => 'all manage']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'producer']);
        $role->givePermissionTo('product manage');

    }
}
