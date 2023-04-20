<?php

namespace Tests\Feature;

use Tests\TestCase;

class TryRoutingTest extends TestCase
{
    public function test_basic(): void
    {
        $response = $this->get('/api/test');
        $response->assertStatus(200);
    }

    public function test_parents(): void
    {
        $response = $this->get('/api/parents');
        $response->assertStatus(200);
    }

    public function test_parent(): void
    {
        $response = $this->get('/api/parents/1');
        $response->assertStatus(200);
    }

    public function test_babies(): void
    {
        $response = $this->get('/api/parents/1/babies');
        $response->assertStatus(200);
    }

    public function test_baby(): void
    {
        $response = $this->get('/api/parents/1/babies/999');
        $response->assertStatus(200);
    }
}
