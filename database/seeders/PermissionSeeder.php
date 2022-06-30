<?php

namespace Database\Seeders;

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
        // create and store permissions
        $permissions = [
            'user_create',
            'user_edit',
            'user_delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        // add permissions to specified role
        $admin = Role::where('name', 'admin')->first();

        foreach ($permissions as $permission) {
            $admin->givePermissionTo($permission);
        }
    }
}
