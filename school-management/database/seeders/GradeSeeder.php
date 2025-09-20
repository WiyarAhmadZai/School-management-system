<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample grades
        Grade::insert([
            // Grades for Ahmad Khan (student_id: 1)
            [
                'student_id' => 1,
                'course_id' => 1, // Algebra and Trigonometry
                'grade' => 'A',
                'marks' => 85.5,
                'remarks' => 'Excellent performance in mathematics',
                'date' => '2025-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'course_id' => 2, // Introduction to Physics
                'grade' => 'B+',
                'marks' => 78.0,
                'remarks' => 'Good understanding of concepts',
                'date' => '2025-06-16',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'course_id' => 3, // English Literature
                'grade' => 'A-',
                'marks' => 82.5,
                'remarks' => 'Strong analytical skills',
                'date' => '2025-06-17',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Grades for Fatima Ahmed (student_id: 2)
            [
                'student_id' => 2,
                'course_id' => 1, // Algebra and Trigonometry
                'grade' => 'A+',
                'marks' => 92.0,
                'remarks' => 'Outstanding mathematical ability',
                'date' => '2025-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'course_id' => 2, // Introduction to Physics
                'grade' => 'A',
                'marks' => 88.5,
                'remarks' => 'Exceptional problem-solving skills',
                'date' => '2025-06-16',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'course_id' => 4, // World History
                'grade' => 'B+',
                'marks' => 79.0,
                'remarks' => 'Good historical knowledge',
                'date' => '2025-06-18',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Grades for Usman Malik (student_id: 3)
            [
                'student_id' => 3,
                'course_id' => 3, // English Literature
                'grade' => 'B',
                'marks' => 75.5,
                'remarks' => 'Satisfactory performance',
                'date' => '2025-06-17',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 3,
                'course_id' => 4, // World History
                'grade' => 'A-',
                'marks' => 84.0,
                'remarks' => 'Excellent historical analysis',
                'date' => '2025-06-18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 3,
                'course_id' => 5, // Organic Chemistry
                'grade' => 'B+',
                'marks' => 77.5,
                'remarks' => 'Good laboratory skills',
                'date' => '2025-06-19',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Grades for Ayesha Siddiqui (student_id: 4)
            [
                'student_id' => 4,
                'course_id' => 1, // Algebra and Trigonometry
                'grade' => 'A',
                'marks' => 86.0,
                'remarks' => 'Strong mathematical foundation',
                'date' => '2025-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 4,
                'course_id' => 3, // English Literature
                'grade' => 'A+',
                'marks' => 94.5,
                'remarks' => 'Exceptional writing skills',
                'date' => '2025-06-17',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 4,
                'course_id' => 6, // Calculus I
                'grade' => 'A-',
                'marks' => 83.5,
                'remarks' => 'Good grasp of calculus concepts',
                'date' => '2025-06-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
