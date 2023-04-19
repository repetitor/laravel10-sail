<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test1(): void
    {
        $response = $this->get('/api/test');
        $response->assertStatus(200);
    }

//    public function test2(): void
//    {
//        $response = $this->get('/tests');
//        $response->assertStatus(200);
//    }
//
//    public function test3(): void
//    {
//        $response = $this->get('/tests/1');
//        $response->assertStatus(200);
//    }
//
//    public function test4(): void
//    {
//        $response = $this->get('/tests/1/test-children');
//        $response->assertStatus(200);
//    }
//
//    public function test5(): void
//    {
//        $response = $this->get('/tests/1/test-children/111');
//        $response->assertStatus(200);
//    }
}
