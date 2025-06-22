<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        // Cria 10 clientes fake
        Cliente::factory()->count(10)->create();
    }
}
