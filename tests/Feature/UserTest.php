<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_tasks()
    {
        // Given we have user in the database
        $user = User::factory()->create();

        // When user visit the users page
        $response = $this->get(route('users.index', $user->id));

        // He should be able to read the users
        $response->assertSee($user->name);
    }
}
