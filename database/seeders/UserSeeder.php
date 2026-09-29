<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'FreshMart Admin',
            'email' => 'admin@freshmart.test',
            'password' => Hash::make('Admin12345!'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'FreshMart Editor',
            'email' => 'editor@freshmart.test',
            'password' => Hash::make('Editor12345!'),
            'role' => 'editor',
        ]);

        User::create([
            'name' => 'FreshMart User',
            'email' => 'user@freshmart.test',
            'password' => Hash::make('User12345!'),
            'role' => 'user',
        ]);
    }
}