<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample teachers
        Teacher::insert([
            [
                'name' => 'Dr. Sarah Johnson',
                'email' => 'sarah.johnson@school.edu',
                'phone' => '0300-1111111',
                'subject' => 'Mathematics',
                'department' => 'Science',
                'qualification' => 'PhD in Mathematics',
                'date_of_birth' => '1980-05-15',
                'address' => 'House 10, Blue Area, Islamabad',
                'salary' => 120000.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Prof. Michael Brown',
                'email' => 'michael.brown@school.edu',
                'phone' => '0300-2222222',
                'subject' => 'Physics',
                'department' => 'Science',
                'qualification' => 'PhD in Physics',
                'date_of_birth' => '1975-08-22',
                'address' => 'Apartment 305, Gulberg, Lahore',
                'salary' => 115000.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ms. Emily Davis',
                'email' => 'emily.davis@school.edu',
                'phone' => '0300-3333333',
                'subject' => 'English',
                'department' => 'Humanities',
                'qualification' => 'MA in English Literature',
                'date_of_birth' => '1985-12-03',
                'address' => 'Flat 404, Clifton, Karachi',
                'salary' => 95000.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mr. James Wilson',
                'email' => 'james.wilson@school.edu',
                'phone' => '0300-4444444',
                'subject' => 'History',
                'department' => 'Humanities',
                'qualification' => 'MA in History',
                'date_of_birth' => '1982-04-18',
                'address' => 'House 89, Cantonment, Rawalpindi',
                'salary' => 90000.00,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Maria Garcia',
                'email' => 'maria.garcia@school.edu',
                'phone' => '0300-5555555',
                'subject' => 'Chemistry',
                'department' => 'Science',
                'qualification' => 'PhD in Chemistry',
                'date_of_birth' => '1978-09-30',
                'address' => 'Villa 15, DHA, Lahore',
                'salary' => 118000.00,
                'status' => 'on_leave',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
