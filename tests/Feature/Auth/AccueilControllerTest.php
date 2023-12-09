<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccueilControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get(route('accueil.index'));

        $response->assertStatus(200);

        $response->assertViewIs('welcome');
    }
}
