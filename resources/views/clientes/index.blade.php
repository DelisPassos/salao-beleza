<x-app-layout>
    <x-header title="Lista de Clientes" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <div class="card bg-dark bg-opacity-75 text-white shadow-lg border-0">
                <div class="card-body">

                    @if(session('success'))
                        <x-auth-session-status :status="session('success')" class="mb-4" />
                    @endif

                    <a href="{{ route('clientes.create') }}" class="btn btn-sm btn-outline-warning mb-3">
                        <i class="bi bi-person-plus-fill me-1"></i> Novo Cliente
                    </a>

                    <div class="table-responsive">
                        <table class="table table-dark table-bordered table-striped table-hover">
                            <thead class="bg-warning text-black">
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->nome }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>{{ $cliente->telefone }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <!-- Botão Editar -->
                                                <a href="{{ route('clientes.edit', $cliente) }}">
                                                    <x-edit-button>Editar</x-edit-button>
                                                </a>

                                                <!-- Botão para abrir o modal -->
                                                <x-delete-button data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $cliente->id }}">
                                                    EXCLUIR
                                                </x-delete-button>
                                            </div>

                                            <!-- Modal de Confirmação -->
                                            <x-confirm-delete 
                                                id="modal-delete-{{ $cliente->id }}"
                                                route="{{ route('clientes.destroy', $cliente) }}"
                                                :item="$cliente->nome"
                                            />

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-white-50">Nenhum cliente cadastrado.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
