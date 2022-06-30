<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_primero()
    {
        $response = $this->get('/jugar/123');

        $response->assertStatus(200);
    }

    public function test_segundo()
    {
        $response = $this->get('/jugar/xz');
        
        $response->assertStatus(500);
    }

    public function test_tercero()
    {
        $response = $this->get('/jugar/123456123456123456123456123456');

        $this->assertTrue(substr_count($html,'bg-sky-500') == 15);
        
        
    }

}