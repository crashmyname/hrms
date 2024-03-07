<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin',
            ],
            ['name' => 'admin']
        );
        $role_writer = Role::updateOrCreate(
            [
                'name' => 'writer',
            ],
            ['name' => 'writer']
        );
        $role_guest = Role::updateOrCreate(
            [
                'name' => 'guest',
            ],
            ['name' => 'guest']
        );
        $permission = Permission::updateOrCreate(
            [
                'name' => 'view_dashboard',
            ],
            ['name' => 'view_dashboard']
        );
        $permission2 = Permission::updateOrCreate(
            [
                'name' => 'employee',
            ],
            ['name' => 'employee']
        );
        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_writer->givePermissionTo($permission2);

        $user = User::find(1);
        $user->assignRole(['admin','writer']);
    }
}
