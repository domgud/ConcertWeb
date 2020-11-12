<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);
        User::create([
            'name' => 'Director User',
            'email' => 'director@director.com',
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);
        User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'role_id' => 3
        ]);
    }
}
