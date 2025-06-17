<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold text-dark">
            Editar Cliente
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{ route('clientes.update', $cliente) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control"
                                   value="{{ old('nome', $cliente->nome) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email', $cliente->email) }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Telefone</label>
                            <input type="text" name="telefone" class="form-control"
                                   value="{{ old('telefone', $cliente->telefone) }}">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
