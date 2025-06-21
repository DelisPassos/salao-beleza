<x-app-layout>
    <x-layout.header :title="'Editar Cliente'" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                {{-- Exibição de erros de validação --}}
                @if ($errors->any())
                    <x-alerts.alert type="danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-alerts.alert>
                @endif

                {{-- Formulário de edição --}}
                <x-forms.form :action="route('clientes.update', $cliente)" :cancelRoute="route('clientes.index')">
                    @method('PUT')

                    <x-forms.input-with-icon
                        id="nome"
                        name="nome"
                        icon="person"
                        :value="old('nome', $cliente->nome)"
                        :error="$errors->first('nome')"
                    />

                    <x-forms.input-with-icon
                        id="email"
                        name="email"
                        icon="envelope"
                        :value="old('email', $cliente->email)"
                        :error="$errors->first('email')"
                    />

                    <x-forms.input-with-icon
                        id="telefone"
                        name="telefone"
                        icon="telephone"
                        :value="old('telefone', $cliente->telefone)"
                        :error="$errors->first('telefone')"
                    />
                </x-forms.form>

            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
