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

                    <div class="row">
                        {{-- Nome --}}
                        <div class="col-md-6">
                            <x-forms.input-with-icon
                                id="nome"
                                name="nome"
                                icon="person-fill"
                                :value="old('nome', $cliente->nome)"
                                :error="$errors->first('nome')"
                            />
                        </div>

                        {{-- CPF --}}
                        <div class="col-md-6">
                            <x-forms.input-with-icon
                                id="cpf"
                                name="cpf"
                                icon="credit-card-2-front-fill"
                                :value="old('cpf', $cliente->cpf)"
                                :error="$errors->first('cpf')"
                            />
                        </div>
                    </div>

                    <div class="row">
                        {{-- Telefone --}}
                        <div class="col-md-6">
                            <x-forms.input-with-icon
                                id="telefone"
                                name="telefone"
                                icon="telephone-fill"
                                :value="old('telefone', $cliente->telefone)"
                                :error="$errors->first('telefone')"
                            />
                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">
                            <x-forms.input-with-icon
                                id="email"
                                name="email"
                                icon="envelope-fill"
                                :value="old('email', $cliente->email)"
                                :error="$errors->first('email')"
                            />
                        </div>
                    </div>

                    <div class="row">
                        {{-- Endereço --}}
                        <div class="col-md-12 mt-3">
                            <x-forms.input-with-icon
                                id="endereco"
                                name="endereco"
                                icon="geo-alt-fill"
                                :value="old('endereco', $cliente->endereco)"
                                :error="$errors->first('endereco')"
                            />
                        </div>
                    </div>
                </x-forms.form>

            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
