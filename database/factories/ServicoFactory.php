<?php

namespace Database\Factories;

use App\Models\Servico;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicoFactory extends Factory
{
    protected $model = Servico::class;

    public function definition(): array
    {
        $nomes = [
            'Corte Feminino',
            'Corte Masculino',
            'Escova',
            'Hidratação Capilar',
            'Coloração',
            'Mechas',
            'Progressiva',
            'Manicure',
            'Pedicure',
            'Design de Sobrancelhas',
            'Maquiagem',
            'Depilação'
        ];

        return [
            'nome' => $nome = $this->faker->unique()->randomElement($nomes),
            'descricao' => match ($nome) {
                'Corte Feminino' => 'Corte estilizado com finalização personalizada.',
                'Corte Masculino' => 'Corte moderno com acabamento na navalha.',
                'Escova' => 'Modelagem dos fios com secador e escova.',
                'Hidratação Capilar' => 'Tratamento profundo para revitalização dos fios.',
                'Coloração' => 'Aplicação de coloração com produtos profissionais.',
                'Mechas' => 'Técnica para clarear e iluminar os fios.',
                'Progressiva' => 'Alisamento com redução de volume e brilho intenso.',
                'Manicure' => 'Cuidado com as unhas e esmaltação.',
                'Pedicure' => 'Tratamento completo para os pés e unhas.',
                'Design de Sobrancelhas' => 'Modelagem profissional das sobrancelhas.',
                'Maquiagem' => 'Maquiagem para eventos ou dia a dia.',
                'Depilação' => 'Remoção de pelos com cera quente ou fria.',
                default => 'Serviço profissional de beleza e estética.',
            },
            'preco' => $this->faker->randomFloat(2, 30, 300),
        ];
    }
}
