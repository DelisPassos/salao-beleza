<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAtendimentoRequest;
use App\Http\Requests\UpdateAtendimentoRequest;

class AtendimentoController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::with(['cliente', 'servicos'])
            ->orderByDesc('data') // Ordenando pela data do atendimento, não por created_at
            ->paginate(10);

        return view('atendimentos.index', compact('atendimentos'));
    }

    public function create()
    {
        $clientes = \App\Models\Cliente::all();
        $profissionais = \App\Models\User::all();
        $servicos = \App\Models\Servico::all();
        $produtos = \App\Models\Produto::all();

        return view('atendimentos.create', compact('clientes', 'profissionais', 'servicos', 'produtos'));
    }

    public function store(StoreAtendimentoRequest $request)
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated) {
            $atendimento = Atendimento::create([
                'cliente_id' => $validated['cliente_id'],
                'profissional_id' => $validated['profissional_id'] ?? null,
                'data' => $validated['data'],
                'valor_pago' => $validated['valor_pago'],
                'observacoes' => $validated['observacoes'] ?? null,
            ]);

            foreach ($validated['servicos'] as $servico) {
                $atendimento->servicos()->attach($servico['id'], [
                    'preco' => $servico['preco'],
                ]);
            }

            if (!empty($validated['produtos'])) {
                foreach ($validated['produtos'] as $produtoData) {
                    $produto = Produto::findOrFail($produtoData['id']);

                    if ($produto->quantidade < $produtoData['quantidade_usada']) {
                        throw new \Exception("Estoque insuficiente do produto: {$produto->nome}");
                    }

                    $produto->decrement('quantidade', $produtoData['quantidade_usada']);

                    $atendimento->produtos()->attach($produto->id, [
                        'quantidade_usada' => $produtoData['quantidade_usada'],
                    ]);
                }
            }
        });

        return redirect()->route('atendimentos.index')
            ->with('success', 'Atendimento registrado com sucesso!');
    }

    public function edit(Atendimento $atendimento)
    {
        $atendimento->load(['cliente', 'profissional', 'servicos', 'produtos']);

        $clientes = \App\Models\Cliente::all();
        $profissionais = \App\Models\User::all();
        $servicos = \App\Models\Servico::all();
        $produtos = \App\Models\Produto::all();

        return view('atendimentos.edit', compact('atendimento', 'clientes', 'profissionais', 'servicos', 'produtos'));
    }

    public function update(UpdateAtendimentoRequest $request, Atendimento $atendimento)
    {
        $validated = $request->validated();

        DB::transaction(function () use ($atendimento, $validated) {
            $atendimento->update([
                'cliente_id' => $validated['cliente_id'],
                'profissional_id' => $validated['profissional_id'] ?? null,
                'data' => $validated['data'],
                'valor_pago' => $validated['valor_pago'],
                'observacoes' => $validated['observacoes'] ?? null,
            ]);

            $syncServicos = [];
            foreach ($validated['servicos'] as $servico) {
                $syncServicos[$servico['id']] = ['preco' => $servico['preco']];
            }
            $atendimento->servicos()->sync($syncServicos);

            // Repor estoque dos produtos antigos
            foreach ($atendimento->produtos as $produto) {
                $produto->increment('quantidade', $produto->pivot->quantidade_usada);
            }

            $syncProdutos = [];
            if (!empty($validated['produtos'])) {
                foreach ($validated['produtos'] as $produtoData) {
                    $produto = Produto::findOrFail($produtoData['id']);

                    if ($produto->quantidade < $produtoData['quantidade_usada']) {
                        throw new \Exception("Estoque insuficiente do produto: {$produto->nome}");
                    }

                    $produto->decrement('quantidade', $produtoData['quantidade_usada']);

                    $syncProdutos[$produto->id] = [
                        'quantidade_usada' => $produtoData['quantidade_usada'],
                    ];
                }
            }

            $atendimento->produtos()->sync($syncProdutos);
        });

        return redirect()->route('atendimentos.index')
            ->with('success', 'Atendimento atualizado com sucesso!');
    }

    public function destroy(Atendimento $atendimento)
    {
        DB::transaction(function () use ($atendimento) {
            foreach ($atendimento->produtos as $produto) {
                $produto->increment('quantidade', $produto->pivot->quantidade_usada);
            }

            $atendimento->servicos()->detach();
            $atendimento->produtos()->detach();
            $atendimento->delete();
        });

        return redirect()->route('atendimentos.index')
            ->with('success', 'Atendimento excluído com sucesso!');
    }
}
