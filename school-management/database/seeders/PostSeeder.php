<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users
        $users = User::all();

        if ($users->count() > 0) {
            // Create sample posts
            Post::create([
                'title' => 'Welcome to Our School Management System',
                'content' => 'We are excited to announce the launch of our new school management system. This platform will help us streamline our educational processes and improve communication between students, teachers, and parents.',
                'user_id' => $users->first()->id,
            ]);

            Post::create([
                'title' => 'New Academic Year Starting Soon',
                'content' => 'The new academic year is just around the corner! We encourage all students to complete their registration process and prepare for an exciting year of learning and growth.',
                'user_id' => $users->first()->id,
            ]);

            Post::create([
                'title' => 'Important Notice: Upcoming Parent-Teacher Meetings',
                'content' => 'Parent-teacher meetings are scheduled for next week. Please check your emails for specific dates and times. These meetings are crucial for discussing your child\'s progress and setting goals for the upcoming term.',
                'user_id' => $users->last()->id,
            ]);

            Post::create([
                'title' => 'School Facilities Update',
                'content' => 'We are pleased to announce that our science laboratory has been upgraded with new equipment. Students will now have access to state-of-the-art facilities for their experiments and research projects.',
                'user_id' => $users->last()->id,
            ]);
        }
    }
}
