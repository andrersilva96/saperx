<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_the_visit_home(): void
    {
        $response = $this->get(route('users.index'));
        $response->assertStatus(200);
    }
}
