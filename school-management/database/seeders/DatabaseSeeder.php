<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run the admin user seeder first
        $this->call(AdminUserSeeder::class);

        // Run the sample data seeder
        $this->call(SampleDataSeeder::class);

        // Run the student seeder
        $this->call(StudentSeeder::class);

        // Run the teacher seeder
        $this->call(TeacherSeeder::class);

        // Run the course seeder
        $this->call(CourseSeeder::class);

        // Run the grade seeder
        $this->call(GradeSeeder::class);

        // Run the post seeder
        $this->call(PostSeeder::class);
    }
}
