<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold text-dark">
            Lista de Clientes
        </h2>
    </x-slot>

    <div class="py-5 bg-black text-white">
        <div class="container">
            <div class="card bg-dark bg-opacity-75 text-white shadow-lg border-0">
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
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
                                                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST"
                                                    onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-warning" title="Excluir">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </div>
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
