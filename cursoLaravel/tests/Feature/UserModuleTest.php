<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuleTest extends TestCase
{
  
     
    /** @test */
    function test_it_create_a_new_user(){
        $this->post('/users/',[
            'name' => 'Jose',
            'email' => 'pedrosanchez@gmail.com',
            'password' => '2686298'
        ])->assertSee('Procesando Informacion...');
    }

 
 
    
}
