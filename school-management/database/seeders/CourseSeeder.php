<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample courses
        Course::insert([
            [
                'name' => 'Algebra and Trigonometry',
                'code' => 'MATH-101',
                'description' => 'Basic concepts of algebra and trigonometry for high school students',
                'teacher_id' => 1, // Dr. Sarah Johnson
                'class' => '9',
                'department' => 'Science',
                'credits' => 3,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Introduction to Physics',
                'code' => 'PHYS-101',
                'description' => 'Fundamental principles of physics including mechanics and thermodynamics',
                'teacher_id' => 2, // Prof. Michael Brown
                'class' => '9',
                'department' => 'Science',
                'credits' => 4,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'English Literature',
                'code' => 'ENG-101',
                'description' => 'Study of classic and contemporary English literature',
                'teacher_id' => 3, // Ms. Emily Davis
                'class' => '10',
                'department' => 'Humanities',
                'credits' => 3,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'World History',
                'code' => 'HIST-101',
                'description' => 'Survey of world history from ancient civilizations to modern times',
                'teacher_id' => 4, // Mr. James Wilson
                'class' => '10',
                'department' => 'Humanities',
                'credits' => 3,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Organic Chemistry',
                'code' => 'CHEM-201',
                'description' => 'Study of organic compounds and their reactions',
                'teacher_id' => 5, // Dr. Maria Garcia
                'class' => '11',
                'department' => 'Science',
                'credits' => 4,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Calculus I',
                'code' => 'MATH-201',
                'description' => 'Introduction to differential and integral calculus',
                'teacher_id' => 1, // Dr. Sarah Johnson
                'class' => '11',
                'department' => 'Science',
                'credits' => 4,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
