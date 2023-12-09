<?php
use Tests\TestCase;
use App\Models\Hall;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class HallControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testIndex()
    {
        Hall::factory()->create();

        $response = $this->get(route('hall.index'));

        $response->assertStatus(302);
        $response->assertLocation(route('login'));
    }


    public function testCreate()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('hall.create'));

        $response->assertStatus(403);

    }

    public function testStore()
    {
        $this->actingAsAdmin();

        $hallData = Hall::factory()->make()->toArray();

        $response = $this->post(route('hall.store'), $hallData);

        $response->assertRedirect(route('hall.index'));
        $this->assertDatabaseHas('halls', $hallData);
    }

    public function testEdit()
    {
        $this->actingAsAdmin();

        $hall = Hall::factory()->create();

        $response = $this->get(route('hall.edit', $hall));

        $response->assertStatus(403);

    }

    public function testUpdate()
    {
        $this->actingAsAdmin();

        $hall = Hall::factory()->create();
        $updatedData = ['nom' => 'Updated Name', 'personnel_minimum' => 10];

        $response = $this->put(route('hall.update', $hall), $updatedData);

        $response->assertRedirect(route('hall.index'));
        $this->assertDatabaseHas('halls', array_merge(['id' => $hall->id], $updatedData));
    }

    public function testDestroy()
    {
        $this->actingAsAdmin();

        $hall = Hall::factory()->create();

        $response = $this->delete(route('hall.destroy', $hall));

        $response->assertStatus(403);


        $this->assertDatabaseMissing('halls', ['id' => $hall->id]);
    }

    protected function actingAsAdmin()
    {
// n
    }
}


?>
