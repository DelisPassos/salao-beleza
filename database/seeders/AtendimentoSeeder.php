<?php

namespace Database\Seeders;

use App\Models\Atendimento;
use Illuminate\Database\Seeder;

class AtendimentoSeeder extends Seeder
{
    public function run(): void
    {
        Atendimento::factory()->count(20)->create();
    }
}
