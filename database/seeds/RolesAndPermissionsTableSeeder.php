<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name'=> 'access administation']);
        // Users permissions
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        // Products permissions
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'approve products']);
        Permission::create(['name' => 'unapprove products']);
        // Comments permissions
        Permission::create(['name' => 'delete comments']);

        // Role Admin
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(Permission::all());

        // Role Moderator
        $roleModerator = Role::create(['name' => 'moderator']);
        $roleModerator->givePermissionTo(['access administation', 'approve products', 'unapprove products', 'delete comments']);
    }
}
