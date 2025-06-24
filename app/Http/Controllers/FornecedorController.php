<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::latest()->get();
        return view('fornecedores.index', compact('fornecedores'));
    }

    public function create()
    {
        return view('fornecedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'     => ['required', 'string', 'max:255'],
            'email'    => ['nullable', 'email', 'max:255'],
            'telefone' => ['nullable', 'string', 'max:20'],
            'cnpj'     => ['required', 'string', 'max:18', 'unique:fornecedores,cnpj'],
            'endereco' => ['nullable', 'string', 'max:255'],
        ]);

        Fornecedor::create($request->all());

        return redirect()->route('fornecedores.index')
                         ->with('success', 'Fornecedor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedores.edit', compact('fornecedor'));
    }

    public function update(Request $request, Fornecedor $fornecedor)
    {
        $request->validate([
            'nome'     => ['required', 'string', 'max:255'],
            'email'    => ['nullable', 'email', 'max:255'],
            'telefone' => ['nullable', 'string', 'max:20'],
            'cnpj'     => ['required', 'string', 'max:18', 'unique:fornecedores,cnpj,' . $fornecedor->id],
            'endereco' => ['nullable', 'string', 'max:255'],
        ]);

        $fornecedor->update($request->all());

        return redirect()->route('fornecedores.index')
                         ->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();

        return redirect()->route('fornecedores.index')
                         ->with('success', 'Fornecedor excluído com sucesso!');
    }
}
