<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Lead;
use App\Models\Course;
use App\Models\Period;
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

        $this->create_user_with_role('Super Admin', 'Super Admin', 'suder-admin@lms.test');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.test');

        // create leads
        Lead::factory()->count(100)->create();

       $course = Course::create([
            'name' => 'Laravel',
            'description' =>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'image' => 'https://laravel.com/img/logomark.min.svg',
            'user_id' => $teacher->id
        ]);

        Period::factory()->count(10)->create();
    }

    private function create_user_with_role($type, $name, $email) {
        $role = Role::create([
            'name' => $type
        ]);

        $user = User::create([
            'name' => '$name',
            'email' => '$email',
            'password' => bcrypt('password')

        ]);

        if($type == 'Super Admin') {
            $permission = Permission::create([
                'name' => 'create-admin'
            ]);
            $role->givePermissionTo($permission);
        }

        $user->assignRole($role);

        return $user;
    }
}