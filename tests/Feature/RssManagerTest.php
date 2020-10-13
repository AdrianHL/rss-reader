<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RssManagerTest extends TestCase
{
    /**
     * Rss Manager Home Page (Not Authenticated)
     *
     * @return void
     * @test
     */
    public function cannotAccessRssManagerIfNotLoggedIn()
    {
        $response = $this->get('/rss-manager');

        $response->assertRedirect('/login');
    }

    /**
     * Rss Manager Home Page (Authenticated)
     *
     * @return void
     * @test
     */
    public function canAccessRssManagerIfNotLoggedIn()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'rss-reader-lover'),
        ]);

        $response = $this->actingAs($user)->get('/rss-manager');

        $response->assertStatus(200);

        $response->assertSee('My RSS Index');
    }
}
