<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomeTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_welcome_page_is_displayed(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test that the login page is accessible.
     */
    public function test_login_page_is_displayed(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Test that the register page is accessible.
     */
    public function test_register_page_is_displayed(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}