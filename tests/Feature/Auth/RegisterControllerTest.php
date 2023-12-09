<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RegisterControllerTest extends TestCase
{



public function it_registers_a_new_user()
{

    $response = $this->post(route('register'), [
        'name' => 'testlol',
        'email' => 'loltest@test.com',
        'password' => '12345678910',
        'password_confirmation' => '12345678910',
    ]);


    $response->assertStatus(200);


    $this->assertDatabaseHas('users', [
        'name' => 'testlol',
        'email' => 'loltest@test.com',
    ]);


    $this->assertAuthenticated();
}


    public function it_validates_required_fields()
    {

        $response = $this->post(route('register'), []);


        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }


}
