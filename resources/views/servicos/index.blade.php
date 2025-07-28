<x-app-layout>
    <x-layout.header title="Lista de Serviços" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                {{-- Alerta de sucesso --}}
                @if(session('success'))
                    <x-alerts.alert type="success" :message="session('success')" class="mb-4" />
                @endif

                {{-- Botão de criação --}}
                <div class="mb-3">
                    <x-buttons.create-button 
                        href="{{ route('servicos.create') }}" 
                        icon="scissors" 
                        label="Novo Serviço" 
                    />
                </div>

                {{-- TABELA responsiva para md+ --}}
                <div class="d-none d-md-block">
                    <x-tables.table :headers="['Nome', 'Descrição', 'Preço', 'Ações']">
                        @forelse ($servicos as $servico)
                            <tr>
                                <td>{{ $servico->nome }}</td>
                                <td><span class="small">{{ $servico->descricao }}</span></td>
                                <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                                <td class="text-center">
                                    <x-tables.actions 
                                        :editRoute="route('servicos.edit', $servico)"
                                        :deleteRoute="route('servicos.destroy', $servico)"
                                        :modalId="'modal-delete-' . $servico->id"
                                        :itemName="'o serviço ' . $servico->nome"
                                    />
                                </td>
                            </tr>
                        @empty
                            <x-tables.table-empty colspan="4" message="Nenhum serviço cadastrado." />
                        @endforelse
                    </x-tables.table>
                </div>

                {{-- CARDS responsivos para sm --}}
                <div class="d-block d-md-none">
                    <x-tables.card-view 
                        :items="$servicos"
                        :fields="[
                            'Nome' => 'nome',
                            'Descrição' => 'descricao',
                            'Preço' => fn($s) => 'R$ ' . number_format($s->preco, 2, ',', '.'),
                        ]"
                        :actions="fn($s) => view('components.tables.actions', [
                            'editRoute' => route('servicos.edit', $s),
                            'deleteRoute' => route('servicos.destroy', $s),
                            'modalId' => 'modal-delete-' . $s->id,
                            'itemName' => 'o serviço ' . $s->nome,
                        ])->render()"
                    />
                </div>

                {{-- Paginação --}}
                <div class="mt-3">
                    {{ $servicos->links('components.buttons.pagination-button') }}
                </div>

            </x-cards.card-t-privado>

            {{--Modais de confirmação--}}
            @foreach ($servicos as $servico)
                <x-modals.confirm-delete 
                    :id="'modal-delete-' . $servico->id"
                    :route="route('servicos.destroy', $servico)"
                    :item="'o serviço ' . $servico->nome"
                />
            @endforeach

        </div>
    </div>
</x-app-layout>
