<?php

namespace Tests\Feature;

use App\Models\Atendimento;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class AtendimentoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Cria usuário autenticado
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    #[Test]
    public function usuario_pode_ver_lista_de_atendimentos()
    {
        Atendimento::factory()->count(3)->create();

        $response = $this->get(route('atendimentos.index'));

        $response->assertStatus(200);
        $response->assertSee('Atendimentos');
    }

    /** @test */
    public function usuario_pode_criar_um_atendimento()
    {
        $cliente = Cliente::factory()->create();
        $servico = Servico::factory()->create();

        $response = $this->post(route('atendimentos.store'), [
            'cliente_id' => $cliente->id,
            'servico_id' => $servico->id,
            'valor_pago' => 150.00,
            'data' => now()->format('Y-m-d H:i:s'),
        ]);

        $response->assertRedirect(route('atendimentos.index'));
        $this->assertDatabaseHas('atendimentos', ['cliente_id' => $cliente->id]);
    }

    /** @test */
    public function usuario_pode_atualizar_um_atendimento()
    {
        $atendimento = Atendimento::factory()->create();
        $novoServico = Servico::factory()->create();

        $response = $this->put(route('atendimentos.update', $atendimento), [
            'cliente_id' => $atendimento->cliente_id,
            'servico_id' => $novoServico->id,
            'valor_pago' => 99.90,
            'data' => now()->format('Y-m-d H:i:s'),
        ]);

        $response->assertRedirect(route('atendimentos.index'));
        $this->assertDatabaseHas('atendimentos', [
            'id' => $atendimento->id,
            'servico_id' => $novoServico->id,
            'valor_pago' => 99.90,
        ]);
    }

    /** @test */
    public function usuario_pode_excluir_um_atendimento()
    {
        $atendimento = Atendimento::factory()->create();

        $response = $this->delete(route('atendimentos.destroy', $atendimento));

        $response->assertRedirect(route('atendimentos.index'));
        $this->assertDatabaseMissing('atendimentos', ['id' => $atendimento->id]);
    }
}
