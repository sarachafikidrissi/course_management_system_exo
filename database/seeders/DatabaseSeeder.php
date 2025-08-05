<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::insert([
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'teacher',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student',
                'guard_name' => 'web'
            ]

        ]);



        $admin = User::create([
            'name' => 'lmodir',
            'email' => 'lmodir@gmail.com',
            'password' => Hash::make('lmodir@gmail.com')
        ]);


        $admin->assignRole('admin');


    }
}
