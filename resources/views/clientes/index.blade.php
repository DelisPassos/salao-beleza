<x-app-layout>
    <x-layout.header title="Lista de Clientes" />

    <div class="py-5 bg-black text-white">
        <div class="container">

            <x-cards.card-t-privado>
                {{-- Alerta de sucesso --}}
                @if(session('success'))
                    <x-alerts.alert type="success" :message="session('success')" class="mb-4" />
                @endif

                {{-- Botão de criação --}}
                <x-buttons.create-button 
                    href="{{ route('clientes.create') }}" 
                    icon="person-plus-fill" 
                    label="Novo Cliente" 
                />

                {{-- Tabela de clientes --}}
                <x-tables.table :headers="['Nome', 'Email', 'Telefone', 'Ações']">
                    @forelse($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- Botão Editar --}}
                                    <a href="{{ route('clientes.edit', $cliente) }}">
                                        <x-buttons.edit-button>Editar</x-buttons.edit-button>
                                    </a>

                                    {{-- Botão Excluir --}}
                                    <x-buttons.delete-button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modal-delete-{{ $cliente->id }}">
                                        Excluir
                                    </x-buttons.delete-button>
                                </div>

                                {{-- Modal de Confirmação --}}
                                <x-modals.confirm-delete 
                                    id="modal-delete-{{ $cliente->id }}"
                                    route="{{ route('clientes.destroy', $cliente) }}"
                                    :item="$cliente->nome"
                                />
                            </td>
                        </tr>
                    @empty
                        <x-tables.table-empty colspan="4" message="Nenhum cliente cadastrado." />
                    @endforelse
                    
                </x-tables.table>
                {{ $clientes->links('components.buttons.pagination-button') }}
            </x-cards.card-t-privado>
            
        </div>
        
    </div>
</x-app-layout>
