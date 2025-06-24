<x-app-layout>
    <x-layout.header title="Lista de Serviços" />

    <div class="py-5 bg-black text-white">
        <div class="container">

            <x-cards.card-t-privado>
                @if(session('success'))
                    <x-alerts.alert type="success" :message="session('success')" />
                @endif

                <x-buttons.create-button 
                    href="{{ route('servicos.create') }}" 
                    icon="scissors" 
                    label="Novo Serviço" 
                />

                <x-tables.table :headers="['Nome', 'Descrição', 'Preço', 'Ações']">
                    @forelse ($servicos as $servico)
                        <tr>
                            <td>{{ $servico->nome }}</td>
                            <td>{{ $servico->descricao }}</td>
                            <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('servicos.edit', $servico) }}">
                                        <x-buttons.edit-button>Editar</x-buttons.edit-button>
                                    </a>

                                    <x-buttons.delete-button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modal-delete-{{ $servico->id }}">
                                        Excluir
                                    </x-buttons.delete-button>
                                </div>

                                <x-modals.confirm-delete 
                                    id="modal-delete-{{ $servico->id }}"
                                    route="{{ route('servicos.destroy', $servico) }}"
                                    item="o serviço {{ $servico->nome }}"
                                />
                            </td>
                        </tr>
                    @empty
                        <x-tables.table-empty colspan="4" message="Nenhum serviço cadastrado." />
                    @endforelse
                </x-tables.table>
            </x-cards.card-t-privado>

        </div>
    </div>
</x-app-layout>
