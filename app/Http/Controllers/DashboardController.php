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
            'vendasHoje' => Atendimento::whereDate('created_at', today())->sum('valor_pago'),
            'servicoPopular' => Servico::withCount('atendimentos')
                                ->orderByDesc('atendimentos_count')
                                ->first()->nome ?? 'Nenhum',
            'clientesAtivos' => Cliente::count(),
            'atendimentosHoje' => Atendimento::whereDate('created_at', today())->count(),
        ]);
    }
}
