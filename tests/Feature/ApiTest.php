<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;

class ApiTest extends TestCase
{
    use DatabaseMigrations;

    public function test_store_user_from_api()
    {
        User::factory()->create();
        $res = $this->get(route('api.users.store'));
        $res->assertJsonCount(1, 'data');
    }

    public function test_store_users_bulk_from_api()
    {
        User::factory(2)->create();
        $res = $this->get(route('api.users.store'));
        $res->assertJsonCount(2, 'data');
    }


    public function test_get_user_data_valid_format()
    {
        $this->json('get', route('api.users.index', 1))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                        'id',
                        'name',
                        'email',
                        'birth_date',
                        'doc',
                        'phones' => [],
                        'email_verified_at',
                        'created_at',
                        'updated_at',
                    ]
                ]
            );
    }

    public function test_get_users_bulk_data_valid_format()
    {
        $this->json('get', route('api.users.index'))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'id',
                            'name',
                            'email',
                            'birth_date',
                            'doc',
                            'phones' => [],
                            'email_verified_at',
                            'created_at',
                            'updated_at',
                        ]
                    ],
                    'links' => ['first', 'last', 'prev', 'next'],
                    'meta' => [
                        'current_page',
                        'from',
                        'last_page',
                        'links' => [
                            ['url', 'label', 'active'],
                            ['url', 'label', 'active'],
                            ['url', 'label', 'active']
                        ],
                        'path',
                        'per_page',
                        'to',
                        'total',
                    ]
                ]
            );
    }
}
