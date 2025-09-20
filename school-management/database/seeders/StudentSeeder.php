<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample students
        Student::insert([
            [
                'name' => 'Ahmad Khan',
                'email' => 'ahmad.khan@example.com',
                'phone' => '0300-1234567',
                'date_of_birth' => '2005-03-15',
                'address' => 'House 123, Street 4, Islamabad',
                'class' => '10',
                'section' => 'A',
                'parent_name' => 'Rashid Khan',
                'parent_phone' => '0300-9876543',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fatima Ahmed',
                'email' => 'fatima.ahmed@example.com',
                'phone' => '0312-2345678',
                'date_of_birth' => '2006-07-22',
                'address' => 'Apartment 45, Block B, Lahore',
                'class' => '9',
                'section' => 'B',
                'parent_name' => 'Ali Ahmed',
                'parent_phone' => '0321-5678901',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usman Malik',
                'email' => 'usman.malik@example.com',
                'phone' => '0333-3456789',
                'date_of_birth' => '2004-11-30',
                'address' => 'Plot 78, Garden Town, Karachi',
                'class' => '11',
                'section' => 'C',
                'parent_name' => 'Tariq Malik',
                'parent_phone' => '0345-6789012',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ayesha Siddiqui',
                'email' => 'ayesha.siddiqui@example.com',
                'phone' => '0345-4567890',
                'date_of_birth' => '2005-01-10',
                'address' => 'Flat 202, Model Town, Faisalabad',
                'class' => '10',
                'section' => 'A',
                'parent_name' => 'Hassan Siddiqui',
                'parent_phone' => '0300-7890123',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bilal Raza',
                'email' => 'bilal.raza@example.com',
                'phone' => '0311-5678901',
                'date_of_birth' => '2006-05-18',
                'address' => 'House 56, Defence Colony, Peshawar',
                'class' => '9',
                'section' => 'B',
                'parent_name' => 'Kamran Raza',
                'parent_phone' => '0322-8901234',
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
