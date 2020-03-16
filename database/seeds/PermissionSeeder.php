<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'manage-posts']);
        Permission::create(['name' => 'manage-users']);

        Role::create(['name' => 'user']);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('manage-posts');
        $adminRole->givePermissionTo('manage-users');
    }
}
