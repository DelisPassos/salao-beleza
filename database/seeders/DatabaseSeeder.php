<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria um usuário admin padrão
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('senha123'), // senha segura para testes locais
        ]);

        // Chama os seeders das entidades principais
        $this->call([
            ClienteSeeder::class,
            ServicoSeeder::class,
            AtendimentoSeeder::class,
            ProdutoSeeder::class,
            FornecedorSeeder::class,
        ]);
    }
}
