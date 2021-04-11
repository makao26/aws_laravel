<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testBasicTest()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    //homeへログインテスト
    public function testHomeTest()
    {
        $this->assertTrue(true);
        $response = $this->get('/');
        $response->assertStatus(200);
        $response = $this->get('/home');
        $response->assertStatus(302);
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
        $response = $this->get('/no_route');
        $response->assertStatus(404);
    }
}
