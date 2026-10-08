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
        employeeModel::create([
            'nama' => 'Test Employee',
            'nip' => 'TEST001',
            'direktorat' => 'IT',
            'bidang' => 'Development',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
