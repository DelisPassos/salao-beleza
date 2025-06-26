<?php

namespace Database\Seeders;

use App\Models\Produto;
use App\Models\Fornecedor; 
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        // Garante que existam fornecedores
        if (Fornecedor::count() === 0) {
            Fornecedor::factory()->count(5)->create();
        }

        // Cria 30 produtos com fornecedores variados
        Produto::factory()->count(30)->make()->each(function ($produto) {
            $produto->fornecedor_id = Fornecedor::inRandomOrder()->first()->id;
            $produto->save();
        });
    }

}
