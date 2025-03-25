<?php

namespace Tests\Feature;

 
use Tests\TestCase;

class ExampleFeatureTest extends TestCase
{
    public function testHomePage()
    {
        $response = $this->get('/'); // HomePage request
        $response->assertStatus(200); // Request State 
        $response->assertSee("Welcome"); // Page detail 
    }
}
