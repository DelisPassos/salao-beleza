<x-app-layout>
    <x-slot name="header">
        <h2>Editar Serviço</h2>
    </x-slot>

    <div class="container py-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('servicos.update', $servico) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $servico->nome) }}" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control">{{ old('descricao', $servico->descricao) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço (R$)</label>
                <input type="number" step="0.01" name="preco" id="preco" class="form-control" value="{{ old('preco', $servico->preco) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>
