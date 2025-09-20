<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Teacher;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a sample admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Note: Students and teachers are created in their respective seeders
        // This seeder is just for the admin user
    }
}
