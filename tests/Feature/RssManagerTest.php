<?php

namespace Tests\Feature;

use App\Rss;
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
    public function cannotAccessRssManagerIfNotAuthenticated()
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
    public function canAccessRssManagerIfNotAuthenticated()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'rss-reader-lover'),
        ]);

        $response = $this->actingAs($user)->get('/rss-manager');

        $response->assertStatus(200);

        $response->assertSee('My RSS Index');
    }

    /**
     * Add Rss Page (Not Authenticated)
     *
     * @return void
     * @test
     */
    public function cannotViewAddRssFormIfNotAuthenticated()
    {
        $response = $this->get('/add-rss');

        $response->assertRedirect('/login');
    }

    /**
     * Add Rss Page (Authenticated)
     *
     * @return void
     * @test
     */
    public function canViewAddRssFormIfAuthenticated()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'rss-reader-lover'),
        ]);

        $response = $this->actingAs($user)->get('/add-rss');

        $response->assertStatus(200);

        $response->assertSee('Add a New RSS');
    }
    
    /**
     * Add Rss Form (Authenticated)
     *
     * @return void
     * @test
     */
    public function canAddRssFormIfAuthenticated()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'rss-reader-lover'),
        ]);

        $faker = \Faker\Factory::create();
        
        $response = $this->actingAs($user)->post('/add-rss', [
            'url' => $faker->url()
        ]);

        $response->assertRedirect('/rss-manager');
    }

    /**
     * View Rss (Authenticated)
     *
     * @return void
     * @test
     */
    public function canViewARssIfAuthenticated()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'rss-reader-lover'),
        ]);

        $rss = factory(Rss::class)->create([
            'user_id' => $user->id
        ]);

        $faker = \Faker\Factory::create();
        
        $response = $this->actingAs($user)->get('/view-rss/' . $rss->id);

        $response->assertStatus(200);

        //ToDo - Improve this test to verify content, or at least to verify blade used
    }

        /**
     * View Rss (Authenticated)
     *
     * @return void
     * @test
     */
    public function cannotViewARssIfNotAvailableToAuthenticatedUser()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'rss-reader-lover'),
        ]);

        $anotherUser = factory(User::class)->create([
            'password' => bcrypt($password = 'rss-reader-lover'),
        ]);

        $rss = factory(Rss::class)->create([
            'user_id' => $anotherUser->id
        ]);

        $faker = \Faker\Factory::create();
        
        $response = $this->actingAs($user)->get('/view-rss/' . $rss->id);

        $response->assertStatus(404);

        $response = $this->actingAs($anotherUser)->get('/view-rss/' . $rss->id);

        $response->assertStatus(200);
    }
}
