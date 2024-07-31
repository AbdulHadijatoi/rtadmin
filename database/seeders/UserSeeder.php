<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Enums\UserRoleEnums;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);

        // create roles and assign created permissions
        $role = Role::create(['name' => UserRoleEnums::ADMIN]);
        $role->givePermissionTo([Permission::all()]);


        $role = Role::create(['name' => UserRoleEnums::USER]);
        $role->givePermissionTo(Permission::all());


        $user = new User;
        $user->first_name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('password');
        $user->original_password = 'password';
        $user->email_verified_at = now();
        $user->save();
        $user->assignRole(UserRoleEnums::ADMIN);


        $user = new User;
        $user->first_name = 'User';
        $user->email = 'user@user.com';
        $user->password = Hash::make('password');
        $user->original_password = 'password';
        $user->email_verified_at = now();
        $user->save();
        $user->assignRole(UserRoleEnums::USER);
    }
}