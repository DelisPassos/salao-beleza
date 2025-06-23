<?php

namespace Database\Seeders;

use App\Models\Atendimento;
use App\Models\Servico;
use App\Models\Cliente;
use Illuminate\Database\Seeder;

class AtendimentoSeeder extends Seeder
{
    public function run(): void
    {
        // Garante que existam serviços e clientes no banco
        $servicos = Servico::all();
        $clientes = Cliente::all();

        // Se não houver dados, encerra o seeder
        if ($servicos->isEmpty() || $clientes->isEmpty()) {
            $this->command->warn('Clientes ou serviços não encontrados. Execute os seeders correspondentes primeiro.');
            return;
        }

        Atendimento::factory()
            ->count(20)
            ->make() // make() ao invés de create() para controlar os dados antes de salvar
            ->each(function ($atendimento) use ($clientes, $servicos) {
                $atendimento->cliente_id = $clientes->random()->id;
                $atendimento->valor_pago = 0; // será somado abaixo
                $atendimento->save();

                // Seleciona de 1 a 3 serviços aleatórios
                $servicosSelecionados = $servicos->random(rand(1, 3));

                foreach ($servicosSelecionados as $servico) {
                    $atendimento->servicos()->attach($servico->id, [
                        'preco' => $servico->preco,
                    ]);
                    $atendimento->valor_pago += $servico->preco;
                }

                $atendimento->save();
            });
    }
}
