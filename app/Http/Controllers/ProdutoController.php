<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidade' => 'required|integer|min:0',
            'volume' => 'nullable|string|max:50',
            'preco' => 'required|numeric|min:0',
        ]);

        Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'quantidade' => $request->quantidade,
            'volume' => $request->volume,
            'preco' => $request->preco,
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidade' => 'required|integer|min:0',
            'volume' => 'nullable|string|max:50',
            'preco' => 'required|numeric|min:0',
        ]);

        $produto->update($request->only(['nome', 'descricao', 'quantidade', 'volume', 'preco']));

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}