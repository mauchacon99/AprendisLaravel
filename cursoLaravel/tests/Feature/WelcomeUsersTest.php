<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /** @test */
    public function test_load_welcome_users_with_nickname()
    {
        $this->get('saludo/Mauricio/Pollo')
        ->assertStatus(200)
        ->assertSee('Bienvenido Mauricio, tu apodo es Pollo');
    }
    /** @test */
    public function test_load_welcome_users_name()
    {
        $this->get('saludo/Mauricio')
        ->assertStatus(200)
        ->assertSee('Bienvenido Mauricio, no tienes apodo.');
    }

}
