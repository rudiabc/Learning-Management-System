<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [  //ditambah untuk exam
            'view exams',
            'create exams',
            'edit exams',
            'delete exams',
        ];

        foreach($permissions as $permission){  //ditambah untuk exam
            Permission::create([
                'name' => $permission,
            ]);
        }

        $ownerRole = Role::create([
            'name' => 'owner'
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $studentRole->givePermissionTo([ //ditambah untuk exam
            'view exams',
        ]);

        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        $teacherRole->givePermissionTo([ //ditambah untuk exam
            'view exams',
            'create exams',
            'edit exams',
            'delete exams',
        ]);

        // Akun super admin untuk mengelola data awal
        $userOwner = User::create([
            'name' => 'Admin',
            'occupation' => 'Educator',
            'avatar' => 'images/default-avatar.png',
            'email' => 'admin@owner.com',
            'password' => bcrypt('123456789')
        ]);

        $userOwner->assignRole($ownerRole);

    }
}
