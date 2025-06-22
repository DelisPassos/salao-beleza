<?php

namespace Database\Seeders;

use App\Models\Servico;
use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    public function run(): void
    {
        $servicos = [
            ['nome' => 'Corte Feminino', 'descricao' => 'Corte estilizado com finalização personalizada.'],
            ['nome' => 'Corte Masculino', 'descricao' => 'Corte moderno com acabamento na navalha.'],
            ['nome' => 'Escova', 'descricao' => 'Modelagem dos fios com secador e escova.'],
            ['nome' => 'Hidratação Capilar', 'descricao' => 'Tratamento profundo para revitalização dos fios.'],
            ['nome' => 'Coloração', 'descricao' => 'Aplicação de coloração com produtos profissionais.'],
            ['nome' => 'Mechas', 'descricao' => 'Técnica para clarear e iluminar os fios.'],
            ['nome' => 'Progressiva', 'descricao' => 'Alisamento com redução de volume e brilho intenso.'],
            ['nome' => 'Manicure', 'descricao' => 'Cuidado com as unhas e esmaltação.'],
            ['nome' => 'Pedicure', 'descricao' => 'Tratamento completo para os pés e unhas.'],
            ['nome' => 'Design de Sobrancelhas', 'descricao' => 'Modelagem profissional das sobrancelhas.'],
        ];

        foreach ($servicos as $servico) {
            Servico::create([
                'nome' => $servico['nome'],
                'descricao' => $servico['descricao'],
                'preco' => fake()->randomFloat(2, 30, 300),
            ]);
        }
    }
}
