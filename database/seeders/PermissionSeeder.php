<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
 
    public function run(): void
    {
        $role_admin = Role::updateOrCreate(
            [
                'name'=>'admin',
            ],
            ['name'=>'admin']
        );
        $role_customer = Role::updateOrCreate(
            [
                'name'=>'customer',
            ],
            ['name'=>'customer']
        );

        $role_guest = Role::updateOrCreate(
            [
                'name'=>'guest',
            ],
            ['name'=>'guest']
        );
        $permission = Permission::updateOrCreate(
            [
                'name'=> 'superadmin',
            ],
            ['name'=> 'superadmin']

        );
        $permission2 = Permission::updateOrCreate(
            [
                'name'=> 'view2_dashboard',
            ],
            ['name'=> 'view2_dashboard']

        );
        $role_admin->givePermissionTo($permission);
        $role_customer->givePermissionTo($permission2);
        $role_guest->givePermissionTo($permission2);

        $user=User::find(7);
        $user2=User::find(27);
        
        $user->assignRole('admin');
        $user2->assignRole('guset');
        
    }
}
