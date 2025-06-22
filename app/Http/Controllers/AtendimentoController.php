<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Cliente;
use App\Models\Servico;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAtendimentoRequest;
use App\Http\Requests\UpdateAtendimentoRequest;

class AtendimentoController extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::with(['cliente', 'servicos'])->latest()->get();

        return view('atendimentos.index', compact('atendimentos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $servicos = Servico::all();

        return view('atendimentos.create', compact('clientes', 'servicos'));
    }

    public function store(StoreAtendimentoRequest $request)
    {
        // Cria o atendimento
        $atendimento = Atendimento::create([
            'cliente_id'     => $request->cliente_id,
            'profissional_id'=> $request->profissional_id,
            'valor_pago'     => $request->valor_pago,
            'data'           => $request->data,
            'observacoes'    => $request->observacoes,
        ]);

        // Associa os serviços selecionados (com preço 0 por padrão)
        foreach ($request->servicos as $servicoId) {
            $atendimento->servicos()->attach($servicoId, ['preco' => 0]);
        }

        return redirect()->route('atendimentos.index')
                         ->with('success', 'Atendimento cadastrado com sucesso!');
    }

    public function edit(Atendimento $atendimento)
    {
        $clientes = Cliente::all();
        $servicos = Servico::all();
        $atendimento->load('servicos');

        return view('atendimentos.edit', compact('atendimento', 'clientes', 'servicos'));
    }

    public function update(UpdateAtendimentoRequest $request, Atendimento $atendimento)
    {
        $atendimento->update([
            'cliente_id'     => $request->cliente_id,
            'profissional_id'=> $request->profissional_id,
            'valor_pago'     => $request->valor_pago,
            'data'           => $request->data,
            'observacoes'    => $request->observacoes,
        ]);

        // Sincroniza os serviços (com preço 0 por padrão)
        $servicos = collect($request->servicos)->mapWithKeys(function ($id) {
            return [$id => ['preco' => 0]];
        });

        $atendimento->servicos()->sync($servicos);

        return redirect()->route('atendimentos.index')
                         ->with('success', 'Atendimento atualizado com sucesso!');
    }

    public function destroy(Atendimento $atendimento)
    {
        $atendimento->delete();

        return redirect()->route('atendimentos.index')
                         ->with('success', 'Atendimento excluído com sucesso!');
    }
}
