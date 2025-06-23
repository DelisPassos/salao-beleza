<x-app-layout>
    <x-layout.header title="Lista de Atendimentos" />

    <div class="py-5 bg-black text-white">
        <div class="container">

            <x-cards.card-t-privado>
                {{-- Alerta de sucesso --}}
                @if(session('success'))
                    <x-alerts.alert type="success" :message="session('success')" class="mb-4" />
                @endif

                {{-- Botão de criação --}}
                <x-buttons.create-button 
                    href="{{ route('atendimentos.create') }}" 
                    icon="calendar-plus" 
                    label="Novo Atendimento" 
                />

                {{-- Tabela de atendimentos --}}
                <x-tables.table :headers="['Cliente', 'Serviços', 'Data', 'Valor', 'Ações']">
                    @forelse($atendimentos as $atendimento)
                        <tr>
                            <td>{{ $atendimento->cliente->nome }}</td>
                            <td>
                                @foreach ($atendimento->servicos as $servico)
                                    <span class="badge bg-warning text-black me-1">{{ $servico->nome }}</span>
                                @endforeach
                            </td>
                            <td>{{ $atendimento->data->format('d/m/Y H:i') }}</td>
                            <td>R$ {{ number_format($atendimento->valor_pago, 2, ',', '.') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- Botão Editar --}}
                                    <a href="{{ route('atendimentos.edit', $atendimento) }}">
                                        <x-buttons.edit-button>Editar</x-buttons.edit-button>
                                    </a>

                                    {{-- Botão Excluir --}}
                                    <x-buttons.delete-button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modal-delete-{{ $atendimento->id }}">
                                        Excluir
                                    </x-buttons.delete-button>
                                </div>

                                {{-- Modal de Confirmação --}}
                                <x-modals.confirm-delete 
                                    id="modal-delete-{{ $atendimento->id }}"
                                    route="{{ route('atendimentos.destroy', $atendimento) }}"
                                    item="o atendimento de {{ $atendimento->cliente->nome }}"
                                />
                            </td>
                        </tr>
                    @empty
                        <x-tables.table-empty colspan="5" message="Nenhum atendimento registrado." />
                    @endforelse
                </x-tables.table>
            </x-cards.card-t-privado>

        </div>
    </div>
</x-app-layout>
