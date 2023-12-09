<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LanguageControllerTest extends TestCase
{
    public function it_changes_language ()
    {

        $this->withSession(['locale' => 'en']);

        // Appelle la route changeLanguage avec la langue 'fr'
        $response = $this->get('/change-language/fr');

        // Vérifie que la langue a été mise à 'fr' dans la session
        $this->assertEquals('fr', session('locale'));


        $response->assertRedirect();
        $response->assertStatus(302);
    }
}
