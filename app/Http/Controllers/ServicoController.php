<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    // LISTAR todos os serviços
    public function index()
    {
        $servicos = Servico::all(); // busca no banco
        return view('servicos.index', compact('servicos'));
    }

    // FORMULÁRIO de criação de serviço
    public function create()
    {
        return view('servicos.create');
    }

    // SALVAR novo serviço
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
        ]);

        Servico::create($request->all());

        return redirect()->route('servicos.index')->with('success', 'Serviço cadastrado com sucesso!');
    }

    // FORMULÁRIO de edição
    public function edit(Servico $servico)
    {
        return view('servicos.edit', compact('servico'));
    }

    // ATUALIZAR serviço
    public function update(Request $request, Servico $servico)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
        ]);

        $servico->update($request->all());

        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso!');
    }

    // DELETAR serviço
    public function destroy(Servico $servico)
    {
        $servico->delete();

        return redirect()->route('servicos.index')->with('success', 'Serviço excluído com sucesso!');
    }
}
