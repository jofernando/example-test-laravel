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
        $street = Street::find(1);
        $this->assertThatPageStatusIsOk(route('streets.index'));
        $this->assertThatPageStatusIsOk(route('streets.show', $street));
        $this->assertThatPageStatusIsOk(route('streets.edit', $street));
        $this->assertThatPageStatusIsOk(route('streets.create'));
    }

    public function test_create_street_with_faker()
    {
        $street = Street::factory()->make();
        $response = $this->post(route('streets.store', $street->toArray()));
        $response->assertSuccessful();
        $this->assertDatabaseHas('streets', ['name' => $street->name]);
    }

    public function test_invalid_name()
    {
        $street = ['name' => '', 'number' => 154];
        $response = $this->post(route('streets.store', $street));
        $response->assertSessionHasErrors(['name']);
        $response->assertSessionDoesntHaveErrors(['number']);
    }

    public function test_paginations_works()
    {
        $response = $this->get(route('streets.index'));
        
    }
}
