<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Servico;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $inicioMes = Carbon::now()->startOfMonth();
        $fimMes = Carbon::now()->endOfMonth();

        return view('dashboard', [
            // Soma dos valores pagos hoje
            'vendasHoje' => Atendimento::whereDate('created_at', today())->sum('valor_pago'),

            // Serviço mais popular
            'servicoPopular' => Servico::withCount('atendimentos')
                ->orderByDesc('atendimentos_count')
                ->value('nome') ?? 'Nenhum',

            // Total de clientes
            'clientesAtivos' => Cliente::count(),

            // Atendimentos hoje
            'atendimentosHoje' => Atendimento::whereDate('created_at', today())->count(),

            // Profissional mais ativo no mês
            'profissionalTop' => User::select('users.id', 'users.name') // selecione apenas as colunas necessárias
                    ->join('atendimentos', 'users.id', '=', 'atendimentos.profissional_id')
                    ->whereBetween('atendimentos.created_at', [$inicioMes, $fimMes])
                    ->groupBy('users.id', 'users.name') // agrupe todas as colunas selecionadas
                    ->selectRaw('COUNT(atendimentos.id) as atendimentos_count')
                    ->orderByDesc('atendimentos_count')
                    ->first(),

            // Receita do mês atual
            'receitaMensal' => Atendimento::whereBetween('created_at', [$inicioMes, $fimMes])->sum('valor_pago'),

            // Produtos com estoque baixo
            'produtosBaixoEstoque' => Produto::where('quantidade', '<', 5)->count(),
        ]);
    }
}
