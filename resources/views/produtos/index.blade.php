<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <a href="{{ route('produtos.create') }}" class="btn btn-primary mb-4">Novo Produto</a>

                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Qtd</th>
                            <th>Unidade</th>
                            <th>Preço</th>
                            <th>Fornecedor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $p)
                            <tr>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->type }}</td>
                                <td>{{ $p->quantity }}</td>
                                <td>{{ $p->unit }}</td>
                                <td>R$ {{ number_format($p->price, 2, ',', '.') }}</td>
                                <td>{{ $p->fornecedor->name }}</td>
                                <td>
                                    <a href="{{ route('produtos.edit', $p->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('produtos.destroy', $p->id) }}" method="POST" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>

