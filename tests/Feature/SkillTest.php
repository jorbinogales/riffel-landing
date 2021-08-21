<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SkillTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    function get_skill()
    {
        $response = $this->get('/api/skill/');
        $response->assertStatus(200);
    }

     /**
     * A basic feature test example.
     *
     * @test
     */
    function get_list_skill()
    {
        $response = $this->get('/api/listskill/');
        $response->assertStatus(200);
    }


}
