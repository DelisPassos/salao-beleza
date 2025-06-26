<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Servico;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $inicioMes = Carbon::now()->startOfMonth();
        $fimMes = Carbon::now()->endOfMonth();

        // Receita total do mês (valor pago pelos atendimentos)
        $receitaMensal = Atendimento::whereBetween('created_at', [$inicioMes, $fimMes])->sum('valor_pago');

        // Custo com produtos usados no mês (preço unitário * quantidade usada)
        $custoProdutosMes = DB::table('atendimento_produto')
            ->join('produtos', 'produtos.id', '=', 'atendimento_produto.produto_id')
            ->whereBetween('atendimento_produto.created_at', [$inicioMes, $fimMes])
            ->selectRaw('SUM(produtos.preco * atendimento_produto.quantidade_usada) as total_custo')
            ->value('total_custo') ?? 0;

        // Lucro estimado (receita - custo dos produtos)
        $lucroMes = $receitaMensal - $custoProdutosMes;

        $estoqueBaixoDetalhado = Produto::select('nome', 'quantidade')
            ->where('quantidade', '<', 5)
            ->orderBy('quantidade')
            ->get();



        return view('dashboard', [
            'vendasHoje' => Atendimento::whereDate('created_at', today())->sum('valor_pago'),

            'servicoPopular' => Servico::withCount('atendimentos')
                ->orderByDesc('atendimentos_count')
                ->value('nome') ?? 'Nenhum',

            'clientesAtivos' => Cliente::count(),

            'atendimentosHoje' => Atendimento::whereDate('created_at', today())->count(),

            'profissionalTop' => User::select('users.id', 'users.name')
                ->join('atendimentos', 'users.id', '=', 'atendimentos.profissional_id')
                ->whereBetween('atendimentos.created_at', [$inicioMes, $fimMes])
                ->groupBy('users.id', 'users.name')
                ->selectRaw('COUNT(atendimentos.id) as atendimentos_count')
                ->orderByDesc('atendimentos_count')
                ->first(),

            'receitaMensal' => $receitaMensal,
            'custoProdutosMes' => $custoProdutosMes,
            'lucroMes' => $lucroMes,

            'totalAtendimentosMes' => Atendimento::whereBetween('created_at', [$inicioMes, $fimMes])->count(),

            'produtosBaixoEstoque' => Produto::where('quantidade', '<', 5)->count(),
            'estoqueTotal' => Produto::sum('quantidade'),

            'produtosMaisUsados' => Produto::withCount('atendimentos')
                ->orderByDesc('atendimentos_count')
                ->value('nome') ?? 'Nenhum',
            
            'estoqueBaixoDetalhado' => $estoqueBaixoDetalhado,

        ]);

    }
}
