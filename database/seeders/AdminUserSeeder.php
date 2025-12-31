<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'majlis17@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Davin',
            'email' => 'muhamddavinlp@gmail.com',
            'password' => Hash::make('MajelisTahfidz2024'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Pandu',
            'email' => 'pandunurasih@gmail.com',
            'password' => Hash::make('MajelisTahfidz2024'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
