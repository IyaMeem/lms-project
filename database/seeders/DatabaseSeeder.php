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
        $user = new User();
        $user->name = 'Super Admin';
        $user->email = 'suder@admin.com';
        $user->password = bcrypt('password');
        $user->save();

        $role = Role::create([
            'name' => 'Super Admin'
        ]);

        $permission = Permission::create([
            'name' => 'create-admin'
        ]);

        $role->givePermissionTo($permission);
        $permission->assignRole($role);

        $user->assignRole($role);

        // create leads
        Lead::factory()->count(100)->create();

       $course = Course::create([
            'name' => 'Laravel',
            'description' =>'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
            'image' => 'https://laravel.com/img/logomark.min.svg'
        ]);

        Period::factory()->count(10)->create();
    }
}
