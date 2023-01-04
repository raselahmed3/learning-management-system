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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = new User();

        $user->name = 'Super Admin';
        $user->email ='superadmin@example.com';
        $user->password = bcrypt('superadmin');
        $user->save();


        $role = Role::create([
            'name' => 'Super Admin',
        ]);

        $permitions = Permission::create(
            ['name'=>'create-admin']
        );

        $role->givePermissionTo($permitions);
        $permitions->assignRole($role);

        $user->assignRole($role);
    }
}
