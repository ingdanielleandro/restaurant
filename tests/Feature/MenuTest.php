<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuTest extends TestCase
{
 //   use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @test void
     */
    public function MuestraMenu()
    {
        $this->get('/menu')
        ->assertStatus(200)
        ->assertSee('Carne a la plancha');
    }
}
