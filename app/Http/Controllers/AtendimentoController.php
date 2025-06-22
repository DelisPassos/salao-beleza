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
        $atendimentos = Atendimento::with(['cliente', 'servico'])->latest()->get();

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
        Atendimento::create($request->validated());

        return redirect()->route('atendimentos.index')->with('success', 'Atendimento cadastrado com sucesso!');
    }

    public function edit(Atendimento $atendimento)
    {
        $clientes = Cliente::all();
        $servicos = Servico::all();

        return view('atendimentos.edit', compact('atendimento', 'clientes', 'servicos'));
    }

    public function update(UpdateAtendimentoRequest $request, Atendimento $atendimento)
    {
        $atendimento->update($request->validated());

        return redirect()->route('atendimentos.index')->with('success', 'Atendimento atualizado com sucesso!');
    }

    public function destroy(Atendimento $atendimento)
    {
        $atendimento->delete();

        return redirect()->route('atendimentos.index')->with('success', 'Atendimento excluído com sucesso!');
    }
}
