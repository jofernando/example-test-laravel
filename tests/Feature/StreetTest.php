<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Street;

class StreetTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_street_with_faker()
    {
        $street = Street::factory()->make();
        $response = $this->post(route('streets.store', $street->toArray()));
        $response->assertSuccessful();
        $this->assertDatabaseHas('streets', ['name' => $street->name]);
    }
}
