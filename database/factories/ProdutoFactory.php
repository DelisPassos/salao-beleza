<?php

namespace Database\Factories;

use App\Models\Produto;
use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word() . ' ' . $this->faker->unique()->numberBetween(1, 9999),
            'descricao' => $this->faker->sentence(6),
            'quantidade' => $this->faker->numberBetween(10, 200),
            'volume' => $this->faker->randomElement(['100ml', '250ml', '500ml', '1L', '200g', '500g']),
            'preco' => $this->faker->randomFloat(2, 5, 500),
            'fornecedor_id' => Fornecedor::factory(),
        ];
    }
}
