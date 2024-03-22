<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function visit_home(): void
    {
        $res = $this->get(route('users.index'));
        $res->assertStatus(200);
    }
}
