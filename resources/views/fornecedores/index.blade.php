<x-app-layout>
    <x-layout.header title="Lista de Fornecedores" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                {{-- Alerta de sucesso --}}
                @if(session('success'))
                    <x-alerts.alert type="success" :message="session('success')" class="mb-4" />
                @endif

                {{-- Botão de criação --}}
                <x-buttons.create-button
                    href="{{ route('fornecedores.create') }}"
                    icon="person-plus"
                    label="Novo Fornecedor"
                />

                {{-- TABELA responsiva para md+ --}}
                <div class="d-none d-md-block">
                    <x-tables.table :headers="['Nome', 'CNPJ', 'Telefone', 'E-mail', 'Ações']">
                        @forelse($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td><span class="small">{{ $fornecedor->cnpj }}</span></td>
                                <td><span class="small">{{ $fornecedor->telefone ?: '—' }}</span></td>
                                <td><span class="small">{{ $fornecedor->email ?: '—' }}</span></td>
                                <td class="text-center">
                                    <x-tables.actions 
                                        :editRoute="route('fornecedores.edit', $fornecedor)"
                                        :deleteRoute="route('fornecedores.destroy', $fornecedor)"
                                        :modalId="'modal-delete-' . $fornecedor->id"
                                        :itemName="'o fornecedor ' . $fornecedor->nome"
                                    />
                                </td>
                            </tr>
                        @empty
                            <x-tables.table-empty colspan="5" message="Nenhum fornecedor cadastrado." />
                        @endforelse
                    </x-tables.table>
                </div>

                {{-- CARDS responsivos para sm --}}
                <div class="d-block d-md-none">
                    <x-tables.card-view 
                        :items="$fornecedores"
                        :fields="[
                            'Nome' => 'nome',
                            'CNPJ' => 'cnpj',
                            'Telefone' => fn($f) => $f->telefone ?: '—',
                            'E-mail' => fn($f) => $f->email ?: '—',
                        ]"
                        :actions="fn($f) => view('components.tables.actions', [
                            'editRoute' => route('fornecedores.edit', $f),
                            'deleteRoute' => route('fornecedores.destroy', $f),
                            'modalId' => 'modal-delete-' . $f->id,
                            'itemName' => 'o fornecedor ' . $f->nome,
                        ])->render()"
                    />
                </div>

                {{-- Paginação --}}
                <div class="mt-3">
                    {{ $fornecedores->links('components.buttons.pagination-button') }}
                </div>
            </x-cards.card-t-privado>

            {{-- Modais de confirmação --}}
            @foreach ($fornecedores as $fornecedor)
                <x-modals.confirm-delete 
                    :id="'modal-delete-' . $fornecedor->id"
                    :route="route('fornecedores.destroy', $fornecedor)"
                    :item="'o fornecedor ' . $fornecedor->nome"
                />
            @endforeach
        </div>
    </div>
</x-app-layout>
