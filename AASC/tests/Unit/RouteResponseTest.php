<?php

namespace Tests\Unit;

use Tests\TestCase;

class RouteResponseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post('/rrtester');
        $response->assertStatus(201);
    }
}
