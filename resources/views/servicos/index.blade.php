<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-dark mb-0">Serviços Cadastrados</h2>
    </x-slot>

    <div class="container py-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('servicos.create') }}" class="btn btn-primary mb-3">Adicionar Novo Serviço</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($servicos as $servico)
                    <tr>
                        <td>{{ $servico->nome }}</td>
                        <td>{{ $servico->descricao }}</td>
                        <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('servicos.edit', $servico) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('servicos.destroy', $servico) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nenhum serviço cadastrado ainda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
