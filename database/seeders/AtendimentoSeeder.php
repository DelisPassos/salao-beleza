<?php

namespace Database\Seeders;

use App\Models\Atendimento;
use App\Models\Servico;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Produto;
use Illuminate\Database\Seeder;

class AtendimentoSeeder extends Seeder
{
    public function run(): void
    {
        $servicos = Servico::all();
        $clientes = Cliente::all();
        $profissionais = User::all();
        $produtos = Produto::where('quantidade', '>', 0)->get();

        if ($servicos->isEmpty() || $clientes->isEmpty() || $profissionais->isEmpty() || $produtos->isEmpty()) {
            $this->command->warn('Clientes, serviços, profissionais ou produtos não encontrados.');
            return;
        }

        Atendimento::factory()
            ->count(20)
            ->make()
            ->each(function ($atendimento) use ($clientes, $servicos, $profissionais, $produtos) {
                $atendimento->cliente_id = $clientes->random()->id;
                $atendimento->profissional_id = $profissionais->random()->id;
                $atendimento->valor_pago = 0;
                $atendimento->save();

                $servicosSelecionados = $servicos->random(rand(1, 3));
                foreach ($servicosSelecionados as $servico) {
                    $atendimento->servicos()->attach($servico->id, [
                        'preco' => $servico->preco,
                    ]);
                    $atendimento->valor_pago += $servico->preco;
                }

                $produtosSelecionados = $produtos->random(rand(1, 2));
                foreach ($produtosSelecionados as $produto) {
                    $quantidadeUsada = rand(1, min(3, $produto->quantidade));
                    $atendimento->produtos()->attach($produto->id, [
                        'quantidade_usada' => $quantidadeUsada,
                    ]);
                    $produto->decrement('quantidade', $quantidadeUsada);
                }

                $atendimento->save();
            });
    }
}
