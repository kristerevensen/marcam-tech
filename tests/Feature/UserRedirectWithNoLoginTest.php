<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRedirectWithNoLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserIsRedirectedWithNoLogin()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }
}
