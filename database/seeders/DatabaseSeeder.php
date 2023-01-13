<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Lead;
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
        $defaultPermissions = ['lead-management', 'create-admin'];
        foreach($defaultPermissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        // Creating Roles, Users using 'create_user_with_role' function and it's parameter.
        $this->create_user_with_role('Super Admin', 'Super Admin', 'sda.hosain@gmail.com');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@gmail.com');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@gmail.com');
        $this->create_user_with_role('Leads', 'Leads', 'leads@gmail.com');


        // Create 100 fake Leads.
        Lead::factory(100)->create();

        // Create a fake single Course.
        $course = Course::create([
            'name' => 'Laravel',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas ipsa in rem vitae numquam veritatis libero amet deleniti consequatur? Itaque.',
            'image' => 'https://rb.gy/gjhgtx',
            'user_id' => $teacher->id
        ]);

        // Create 10 fake Curriculum names.
        Curriculum::factory()->count(10)->create();
    }

    // Make a function for create roles and users.
    private function create_user_with_role($type, $name, $email){
        $role = Role::create([
            'name' => $type
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password')
        ]);

        // Assign a logic if this $type parameter is a Super Admin, then give permission for create admin.
        if($type == 'Super Admin') {
            $role->givePermissionTo(Permission::all());
        }elseif($type == 'Leads') {
            $role->givePermissionTo('lead-management');
        }

        // Created user merged with role.
        $user->assignRole($role);

        return $user;
    }
}
