<x-app-layout>
    <x-layout.header title="Editar Fornecedor" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                {{-- Formulário de edição --}}
                <x-forms.form :action="route('fornecedores.update', $fornecedor)" :cancelRoute="route('fornecedores.index')">
                    @method('PUT')

                    <div class="row">
                        {{-- Nome --}}
                        <div class="col-md-6">
                            <x-forms.input-with-icon
                                id="nome"
                                name="nome"
                                icon="person-fill"
                                value="{{ old('nome', $fornecedor->nome) }}"
                                :error="$errors->first('nome')"
                            />
                        </div>

                        {{-- CNPJ --}}
                        <div class="col-md-6">
                            <x-forms.input-with-icon
                                id="cnpj"
                                name="cnpj"
                                icon="file-earmark-text"
                                value="{{ old('cnpj', $fornecedor->cnpj) }}"
                                :error="$errors->first('cnpj')"
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
                                value="{{ old('telefone', $fornecedor->telefone) }}"
                                :error="$errors->first('telefone')"
                            />
                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">
                            <x-forms.input-with-icon
                                id="email"
                                name="email"
                                icon="envelope-fill"
                                value="{{ old('email', $fornecedor->email) }}"
                                :error="$errors->first('email')"
                            />
                        </div>
                    </div>

                    <div class="row">
                        {{-- Endereço --}}
                        <div class="col-md-12">
                            <x-forms.input-with-icon
                                id="endereco"
                                name="endereco"
                                icon="geo-alt-fill"
                                value="{{ old('endereco', $fornecedor->endereco) }}"
                                :error="$errors->first('endereco')"
                            />
                        </div>
                    </div>

                </x-forms.form>

            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
