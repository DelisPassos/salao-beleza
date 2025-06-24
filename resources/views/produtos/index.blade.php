<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent shadow-sm sm:rounded-lg p-4">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <a href="{{ route('produtos.create') }}" class="btn btn-sm btn-outline-warning mb-3">Novo Produto</a>



                <table class="table table-dark table-striped table-bordered text-white align-middle bg-opacity-50">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Volume/Peso</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $p)
                            <tr>
                                <td>{{ $p->nome }}</td>
                                <td style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $p->descricao }}">
                                {{ $p->descricao }}</td>
                                <td>{{ $p->quantidade }}</td>
                                @php
                                $nome = strtolower($p->nome);
                                $unidade = Str::contains($nome, ['tinta', 'óleo', 'líquido']) ? 'ml' : 'g';
                                @endphp
                                <td>{{ $p->volume }} {{ $unidade }}</td> <!-- Volume/Peso -->
                                <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                    <a href="{{ route('produtos.edit', $p->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                                    <form action="{{ route('produtos.destroy', $p->id) }}" method="POST" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
