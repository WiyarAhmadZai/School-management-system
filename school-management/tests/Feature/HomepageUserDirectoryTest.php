<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class HomepageUserDirectoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function homepage_displays_user_directory()
    {
        // Create some sample users
        $user1 = User::factory()->create(['name' => 'John Doe', 'email' => 'john@example.com']);
        $user2 = User::factory()->create(['name' => 'Jane Smith', 'email' => 'jane@example.com']);
        $user3 = User::factory()->create(['name' => 'Bob Johnson', 'email' => 'bob@example.com']);

        // Acting as one user to visit the homepage
        $this->actingAs($user1);

        // Visit the homepage
        $response = $this->get('/');

        // Assert that the homepage loads successfully
        $response->assertStatus(200);

        // Assert that the user directory section is present
        $response->assertSee('Our Community');
        $response->assertSee('Connect with other members of our school community');

        // Assert that all users except the current user are displayed
        $response->assertSee('Jane Smith');
        $response->assertSee('jane@example.com');
        $response->assertSee('Bob Johnson');
        $response->assertSee('bob@example.com');

        // Assert that the current user is not displayed in the directory
        $response->assertDontSee('John Doe');
    }

    /** @test */
    public function homepage_user_directory_links_to_user_profiles()
    {
        // Create a sample user
        $user = User::factory()->create(['name' => 'Test User', 'email' => 'test@example.com']);

        // Acting as another user to visit the homepage
        $visitor = User::factory()->create(['name' => 'Visitor', 'email' => 'visitor@example.com']);
        $this->actingAs($visitor);

        // Visit the homepage
        $response = $this->get('/');

        // Assert that the user profile link is present
        $response->assertSee('href="' . route('profile.show', $user->id) . '"', false);
    }
}
