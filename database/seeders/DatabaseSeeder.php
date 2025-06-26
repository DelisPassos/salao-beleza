<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Fornecedor;
use App\Models\Servico; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->count(10)->profissional()->create();


        // Chama os seeders das entidades principais
        $this->call([
            UserSeeder::class,
            ClienteSeeder::class,
            ServicoSeeder::class,
            AtendimentoSeeder::class,
            ProdutoSeeder::class,
            FornecedorSeeder::class,
        ]);

    }
}
