<?php

use Tests\TestCase;
use App\Models\PorteEmbarquement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class PorteEmbarquementControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('porte-embarquement.index'));

        $response->assertRedirect(route('login'));
    }
    public function testCreate()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('porte-embarquement.create'));

        $response->assertStatus(403);
    }

    public function testStore()
    {
        $this->actingAsAdmin();

        $porteEmbarquementData = PorteEmbarquement::factory()->make()->toArray();

        $response = $this->post(route('porte-embarquement.store'), $porteEmbarquementData);

        $response->assertRedirect(route('porte-embarquement.index'));
        $this->assertDatabaseHas('porte_embarquements', $porteEmbarquementData);
    }

    public function testEdit()
    {
        $this->actingAsAdmin();

        $porteEmbarquement = PorteEmbarquement::factory()->create();

        $response = $this->get(route('porte-embarquement.edit', $porteEmbarquement));

        $response->assertStatus(403);
    }

    public function testUpdate()
    {
        $this->actingAsAdmin();

        $porteEmbarquement = PorteEmbarquement::factory()->create();
        $updatedData = ['nom' => 'Updated Name', 'capacite_maximale' => 20];

        $response = $this->put(route('porte-embarquement.update', $porteEmbarquement), $updatedData);

        $response->assertRedirect(route('porte-embarquement.index'));
        $this->assertDatabaseHas('porte_embarquements', array_merge(['id' => $porteEmbarquement->id], $updatedData));
    }

    public function testDestroy()
    {
        $this->actingAsAdmin();

        $porteEmbarquement = PorteEmbarquement::factory()->create();

        $response = $this->delete(route('porte-embarquement.destroy', $porteEmbarquement));

        $response->assertStatus(403);

        $this->assertDatabaseMissing('porte_embarquements', ['id' => $porteEmbarquement->id]);
    }

    protected function actingAsAdmin()
    {
        //
    }
}
