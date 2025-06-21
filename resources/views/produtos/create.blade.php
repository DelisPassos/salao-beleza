<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cadastrar Produto
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="bg-dark bg-opacity-75 text-white rounded shadow p-5">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('produtos.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Produto</label>
                        <input type="text" name="nome" id="nome" class="form-control bg-light text-dark border-warning" required>
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control bg-light text-dark border-warning" rows="2"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="number" name="quantidade" id="quantidade" class="form-control bg-light text-dark border-warning" required>
                    </div>

                    <div class="mb-3">
                        <label for="volume" class="form-label">Volume/Peso</label>
                        <input type="number" name="volume" id="volume" class="form-control bg-light text-dark border-warning" required>
                    </div>

                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço (R$)</label>
                        <input type="number" step="0.01" name="preco" id="preco" class="form-control bg-light text-dark border-warning" required>
                    </div>

                    <button type="submit" class="btn btn-sm btn-outline-warning">Salvar</button>
                    <a href="{{ route('produtos.index') }}" class="btn btn-sm btn-outline-light">Voltar</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>