<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * Home Page.
     *
     * @return void
     * @test
     */
    public function homePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Login Page.
     *
     * @return void
     * @test
     */
    public function loginPage()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    
    /**
     * Register Page.
     *
     * @return void
     * @test
     */
    public function registerPage()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
