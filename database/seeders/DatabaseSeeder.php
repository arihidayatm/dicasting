<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Stunting::factory(10)->create();

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mahdev.com',
            'role' => 'super_admin',
            'password' => Hash::make('qwerty123'),
        ]);
        
        User::create([
            'name' => 'Admin',
            'email' => 'admin.baren@mahdev.com',
            'role' => 'admin',
            'password' => Hash::make('qwerty123'),
        ]);

        User::create([
            'name' => 'Dinas Sosial',
            'email' => 'opd@mahdev.com',
            'role' => 'user',
            'password' => Hash::make('qwerty123'),
        ]);
    }
}
