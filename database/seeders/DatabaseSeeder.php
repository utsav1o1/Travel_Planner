<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Destination;
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
        //  User::factory(10)->create();
        // Destination::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Admin::factory()->create([
            'name' => 'Admin User',
            'email' => 'utsav@gmail.com',
            'password' => Hash::make('password') 
            
        ]);
    }
}
