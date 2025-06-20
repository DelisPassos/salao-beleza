<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ClienteSeeder::class,
            // ServiçoSeeder::class,
            // ProdutoSeeder::class,
            // FornecedorSeeder::class,
        ]);
    }
}
