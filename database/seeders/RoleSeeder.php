<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        // Role::create(['name' => 'Super Admin']);
        // $admin = Role::create(['name' => 'Admin']);

       

       # multiple role create
        // $role = new Role();
        // $role->name = 'user';
        // $role->name = 'admin';
        // $role->name = 'super admin';
        // $role->name = 'manager';

        // $role->save();

        // $role = new Role();
        // $role->name = 'staff';

        $roles = [
            'user',
            'admin',
            'super admin',
            'staff'
        ];

        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
        

    }
}
