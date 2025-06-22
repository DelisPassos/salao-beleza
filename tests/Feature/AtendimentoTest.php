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

    #[Test]
    public function usuario_pode_criar_um_atendimento()
    {
        $cliente = Cliente::factory()->create();
        $servico = Servico::factory()->create();

        $response = $this->post(route('atendimentos.store'), [
            'cliente_id' => $cliente->id,
            'valor_pago' => 150.00,
            'data' => now()->format('Y-m-d H:i:s'),
            'servicos' => [$servico->id], // ← campo array vindo do form
        ]);

        $response->assertRedirect(route('atendimentos.index'));
        $this->assertDatabaseHas('atendimentos', ['cliente_id' => $cliente->id]);
        $this->assertDatabaseHas('atendimento_servico', ['servico_id' => $servico->id]);
    }

    #[Test]
    public function usuario_pode_atualizar_um_atendimento()
    {
        $cliente = Cliente::factory()->create();
        $atendimento = Atendimento::factory()->create(['cliente_id' => $cliente->id]);
        $servico = Servico::factory()->create();

        // Vincula serviço atual
        $atendimento->servicos()->attach($servico->id, ['preco' => 89.90]);

        $novoServico = Servico::factory()->create();

        $response = $this->put(route('atendimentos.update', $atendimento), [
            'cliente_id' => $cliente->id,
            'valor_pago' => 99.90,
            'data' => now()->format('Y-m-d H:i:s'),
            'servicos' => [$novoServico->id], // novo array de serviços
        ]);

        $response->assertRedirect(route('atendimentos.index'));

        $this->assertDatabaseHas('atendimentos', [
            'id' => $atendimento->id,
            'valor_pago' => 99.90,
        ]);

        $this->assertDatabaseHas('atendimento_servico', [
            'atendimento_id' => $atendimento->id,
            'servico_id' => $novoServico->id,
        ]);
    }

    #[Test]
    public function usuario_pode_excluir_um_atendimento()
    {
        $atendimento = Atendimento::factory()->create();

        $response = $this->delete(route('atendimentos.destroy', $atendimento));

        $response->assertRedirect(route('atendimentos.index'));
        $this->assertDatabaseMissing('atendimentos', ['id' => $atendimento->id]);
    }
}
