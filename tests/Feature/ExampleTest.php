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
        $response = file_get_contents('https://cuatroenlinea.ddev.site/jugar/123456123456123456123456123456');

        $this->assertTrue(substr_count($response,'bg-sky-500') == 15);
        

    }

    public function test_cuarta()
    {
        $response = file_get_contents('https://cuatroenlinea.ddev.site/jugar/123456123456123456123456123456');

        $this->assertTrue(substr_count($response,'bg-red-500') == 22);

    }

    public function test_quinta()
    {
        $response = file_get_contents('https://cuatroenlinea.ddev.site/jugar/123456123456123456123456123456');

        $this->assertTrue(substr_count($response,'bg-gray-200') == 12);
        
    }
}