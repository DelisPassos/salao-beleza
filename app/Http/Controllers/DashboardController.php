<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Servico;
use App\Models\Cliente;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            // Soma dos valores pagos hoje
            'vendasHoje' => Atendimento::whereDate('created_at', today())->sum('valor_pago'),

            // Serviço mais popular baseado no número de atendimentos na pivot
            'servicoPopular' => Servico::withCount('atendimentos')
                ->orderByDesc('atendimentos_count')
                ->value('nome') ?? 'Nenhum',

            // Contagem total de clientes
            'clientesAtivos' => Cliente::count(),

            // Total de atendimentos feitos hoje
            'atendimentosHoje' => Atendimento::whereDate('created_at', today())->count(),
        ]);
    }
}
