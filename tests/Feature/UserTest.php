<?php

namespace Tests\Feature;

use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->json('GET', 'api/events')
            ->assertStatus(200);
    }
    public function testExample2()
    {
        $this->json('GET', 'api/organisers')
            ->assertStatus(200);
    }
    public function testExample3()
    {
        $this->json('GET', 'api/events/1/comments')
            ->assertStatus(200);
    }
    public function testExample4()
    {
        $this->json('GET', 'api/users')
            ->assertStatus(401);
    }
}
