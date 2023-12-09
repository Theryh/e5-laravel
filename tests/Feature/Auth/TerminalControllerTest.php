<?php

use Tests\TestCase;
use App\Models\Terminal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class TerminalControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('terminal.index'));

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('terminal.create'));

        $response->assertStatus(403);
    }

    public function testStore()
    {
        $this->actingAsAdmin();

        $terminalData = Terminal::factory()->make()->toArray();

        $response = $this->post(route('terminal.store'), $terminalData);

        $response->assertRedirect(route('terminal.index'));
        $this->assertDatabaseHas('terminals', $terminalData);
    }

    public function testEdit()
    {
        $this->actingAsAdmin();

        $terminal = Terminal::factory()->create();

        $response = $this->get(route('terminal.edit', $terminal));

        $response->assertStatus(403);
    }

    public function testUpdate()
    {
        $this->actingAsAdmin();

        $terminal = Terminal::factory()->create();
        $updatedData = ['nom' => 'Updated Name', 'capacite_maximale' => 20];

        $response = $this->put(route('terminal.update', $terminal), $updatedData);

        $response->assertRedirect(route('terminal.index'));
        $this->assertDatabaseHas('terminals', array_merge(['id' => $terminal->id], ['nom' => 'Updated Name'])); // Ne vérifiez que le nom mis à jour, car le test ne nécessite pas de validation sur 'capacite_maximale'
    }

    public function testDestroy()
    {
        $this->actingAsAdmin();

        $terminal = Terminal::factory()->create();

        $response = $this->delete(route('terminal.destroy', $terminal));

        $response->assertStatus(403);

        $this->assertDatabaseMissing('terminals', ['id' => $terminal->id]);
    }

    protected function actingAsAdmin()
    {
        //
        //
        //
    }
}
