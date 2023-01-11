<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Shamim Rahman';
        $user->email = 'sda.hosain@gmail.com';
        $user->password = bcrypt('$hamim7464605');
        $user->save();

        // Create Role & Permission of this user

        $role = Role::create(['name' => 'Super Admin']);
        $permission = Permission::create(['name' => 'create-admin']);

        // Assigned with Role & Permission

        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $user->assignRole($role);
    }
}
