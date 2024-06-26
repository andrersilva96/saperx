<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class DocumentationTest extends TestCase
{
    // use RefreshDatabase;

    /** @test */
    public function visit_documentation(): void
    {
        $res = Http::get('https://betterstack.com/community/guides/testing/laravel-unit-testing/');
        $this->assertTrue($res->ok());
    }
}
