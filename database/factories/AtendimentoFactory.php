<?php

namespace Database\Factories;

use App\Models\Atendimento;
use App\Models\Cliente;
use App\Models\Servico;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtendimentoFactory extends Factory
{
    protected $model = Atendimento::class;

    public function definition(): array
    {
        return [
            'cliente_id' => Cliente::factory(),
            'valor_pago' => $this->faker->randomFloat(2, 50, 500),
            'data' => now(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Atendimento $atendimento) {
            $servicos = Servico::inRandomOrder()->take(rand(1, 3))->get();

            foreach ($servicos as $servico) {
                $atendimento->servicos()->attach($servico->id, [
                    'preco' => $servico->preco ?? $this->faker->randomFloat(2, 30, 200),
                ]);
            }
        });
    }
}
