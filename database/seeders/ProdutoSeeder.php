<?php

namespace Database\Seeders;

use App\Models\Produto;
use App\Models\Fornecedor; 
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        // Garante que exista ao menos um fornecedor
        if (Fornecedor::count() === 0) {
            \App\Models\Fornecedor::factory()->count(5)->create();
        }

        Produto::factory()->count(10)->create([
            'fornecedor_id' => Fornecedor::inRandomOrder()->first()->id,
        ]);
    }
}
