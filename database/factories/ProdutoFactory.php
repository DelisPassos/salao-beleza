<?php

namespace Database\Factories;

use App\Models\Produto;
use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->randomElement([
                    'Shampoo', 'Condicionador', 'Máscara Capilar', 'Óleo Reparador',
                    'Leave-in', 'Spray Fixador', 'Creme de Pentear', 'Ampola de Hidratação',
                    'Secador Profissional', 'Chapinha Titanium', 'Modelador de Cachos'
                ]) . ' ' .
                $this->faker->randomElement([
                    'Liso Perfeito', 'Brilho Intenso', 'Nutrição Total', 'Reconstrução Profunda',
                    'Cachos Definidos', 'Hidratação Máxima', 'Color Protect', 'Anti-Frizz'
                ]) . ' ' .
                $this->faker->unique()->randomNumber(3),

            'descricao' => $this->faker->sentence(6),
            'quantidade' => $this->faker->numberBetween(10, 200),
            'volume' => $this->faker->randomElement(['100ml', '250ml', '500ml', '1L', '200g', '500g']),
            'preco' => $this->faker->randomFloat(2, 5, 500),
            'fornecedor_id' => Fornecedor::factory(),
        ];
    }
}
