<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

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
        Permission::create(['name' => 'see admin']);
        
        Permission::create(['name' => 'see users']);
        Permission::create(['name' => 'edit users']);
        // Permission::create(['name' => 'edit blog']);
        // Permission::create(['name' => 'delete blog']);


        Permission::create(['name' => 'see roles']);
        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $user = User::find(1);
        $user->assignRole('admin');
        
    }
}
