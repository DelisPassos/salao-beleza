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
            'servico_id' => Servico::factory(),
            'valor_pago' => $this->faker->randomFloat(2, 50, 500),
            'data' => now(),
        ];
    }
}
