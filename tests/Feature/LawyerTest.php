<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LawyerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    function get_list_lawyer()
    {
        $response = $this->get('/api/lawyer/');
        $response->assertStatus(200);
    }

       /**
     * A basic feature test example.
     *
     * @test
     */
    function find_one_laywer(){
        $response = $this->get('/api/lawyer/1');
        $response->assertStatus(200);
    }

}
