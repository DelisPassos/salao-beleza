<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    public function test_clientes_index_is_accessible_by_authenticated_user(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/clientes');

        $response->assertStatus(200);
    }

    public function test_clientes_are_listed(): void
    {
        $user = User::factory()->create();

        Cliente::factory()->count(3)->create();

        $response = $this
            ->actingAs($user)
            ->get('/clientes');

        $response->assertSeeTextInOrder(
            Cliente::pluck('nome')->toArray()
        );
    }
}
