<?php

namespace Database\Seeders;

use App\Models\employeeModel;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        employeeModel::create([
            'nama' => 'Test Employee',
            'nip' => 'TEST001',
            'direktorat' => 'IT',
            'bidang' => 'Development',
=======
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
>>>>>>> 3ad159c (used laravel pint to ensure code formatting and consistency across the project)
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
