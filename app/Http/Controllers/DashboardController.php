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
        $hoje = Carbon::today();
        $inicioMes = Carbon::now()->startOfMonth();
        $fimMes = Carbon::now()->endOfMonth();

        // Custo com produtos usados hoje (usando data do atendimento)
        $custoProdutosDia = DB::table('atendimento_produto')
            ->join('atendimentos', 'atendimentos.id', '=', 'atendimento_produto.atendimento_id')
            ->join('produtos', 'produtos.id', '=', 'atendimento_produto.produto_id')
            ->whereDate('atendimentos.data', $hoje)
            ->selectRaw('SUM(produtos.preco * atendimento_produto.quantidade_usada) as total_custo')
            ->value('total_custo') ?? 0;

        // Receita total do mês (com base na data do atendimento)
        $receitaMensal = Atendimento::whereBetween('data', [$inicioMes, $fimMes])->sum('valor_pago');

        // Custo com produtos usados no mês (com base na data do atendimento)
        $custoProdutosMes = DB::table('atendimento_produto')
            ->join('atendimentos', 'atendimentos.id', '=', 'atendimento_produto.atendimento_id')
            ->join('produtos', 'produtos.id', '=', 'atendimento_produto.produto_id')
            ->whereBetween('atendimentos.data', [$inicioMes, $fimMes])
            ->selectRaw('SUM(produtos.preco * atendimento_produto.quantidade_usada) as total_custo')
            ->value('total_custo') ?? 0;

        // Lucro estimado (receita - custo dos produtos)
        $lucroMes = $receitaMensal - $custoProdutosMes;

        // Produtos com estoque baixo detalhado
        $estoqueBaixoDetalhado = Produto::select('nome', 'quantidade')
            ->where('quantidade', '<', 5)
            ->orderBy('quantidade')
            ->get();

        return view('dashboard', [
            // Estatísticas do Dia
            'vendasHoje' => Atendimento::whereDate('data', $hoje)->sum('valor_pago'),
            'atendimentosHoje' => Atendimento::whereDate('data', $hoje)->count(),

            // Estatísticas do Mês
            'receitaMensal' => $receitaMensal,
            'custoProdutosMes' => $custoProdutosMes,
            'lucroMes' => $lucroMes,
            'totalAtendimentosMes' => Atendimento::whereBetween('data', [$inicioMes, $fimMes])->count(),

            // Outras Informações
            'servicoPopular' => Servico::withCount(['atendimentos' => function ($query) use ($inicioMes, $fimMes) {
                    $query->whereBetween('data', [$inicioMes, $fimMes]);
                }])
                ->orderByDesc('atendimentos_count')
                ->value('nome') ?? 'Nenhum',

            'profissionalTop' => User::select('users.id', 'users.name')
                ->join('atendimentos', 'users.id', '=', 'atendimentos.profissional_id')
                ->whereBetween('atendimentos.data', [$inicioMes, $fimMes])
                ->groupBy('users.id', 'users.name')
                ->selectRaw('COUNT(atendimentos.id) as atendimentos_count')
                ->orderByDesc('atendimentos_count')
                ->first(),

            'clientesAtivos' => Cliente::count(),
            'produtosBaixoEstoque' => Produto::where('quantidade', '<', 5)->count(),
            'estoqueTotal' => Produto::sum('quantidade'),

            'produtosMaisUsados' => Produto::withCount('atendimentos')
                ->orderByDesc('atendimentos_count')
                ->value('nome') ?? 'Nenhum',

            'estoqueBaixoDetalhado' => $estoqueBaixoDetalhado,
            'custoProdutosDia' => $custoProdutosDia,
        ]);
    }
}
