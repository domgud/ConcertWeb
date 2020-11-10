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
        $adminRole = Role::where('name', 'admin')->first()->id;
        $trainerRole = Role::where('name', 'trainer')->first()->id;
        $userRole = Role::where('name', 'user')->first()->id;

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole
        ]);
        $trainer = User::create([
            'name' => 'Trainer User',
            'email' => 'trainer@trainer.com',
            'password' => Hash::make('password'),
            'role_id' => $trainerRole
        ]);
        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'role_id' => $userRole
        ]);
    }
}
