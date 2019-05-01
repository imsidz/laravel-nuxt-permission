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
        Permission::create(['name' => 'edit user']);

        Permission::create(['name' => 'see roles']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'add role']);
        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());


        Role::create(['name' => 'moderator']);

        $user = User::find(1);
        $user->assignRole('admin');
        
    }
}
