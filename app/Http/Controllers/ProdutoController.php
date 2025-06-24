<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Lista todos os produtos.
     */
    public function index()
    {
        $produtos = Produto::with('fornecedor')->latest()->paginate(10);
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Mostra o formulário de criação.
     */
    public function create()
    {
        $fornecedores = \App\Models\Fornecedor::orderBy('nome')->get();
        return view('produtos.create', compact('fornecedores'));
    }

    /**
     * Armazena um novo produto no banco.
     */
    public function store(StoreProdutoRequest $request)
    {
        Produto::create($request->validated());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Mostra o formulário de edição.
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::orderBy('nome')->get();
        return view('produtos.edit', compact('produto', 'fornecedores'));
    }

    /**
     * Atualiza os dados de um produto.
     */
    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
        $produto->update($request->validated());

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove o produto do banco.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
                         ->with('success', 'Produto excluído com sucesso!');
    }
}
