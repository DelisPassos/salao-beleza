<x-app-layout>
    <x-layout.header title="Cadastrar Fornecedor" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                {{-- Formulário de criação --}}
                <x-forms.form :action="route('fornecedores.store')" :cancelRoute="route('fornecedores.index')">
                    <div class="row">
                        {{-- Nome --}}
                        <div class="col-md-6">
                            <x-forms.input-with-icon
                                id="nome"
                                name="nome"
                                icon="person"
                                value="{{ old('nome') }}"
                                :error="$errors->first('nome')"
                            />
                        </div>

                        {{-- CNPJ --}}
                        <div class="col-md-6">
                            <x-forms.input-with-icon
                                id="cnpj"
                                name="cnpj"
                                icon="file-earmark-text"
                                value="{{ old('cnpj') }}"
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
                                icon="telephone"
                                value="{{ old('telefone') }}"
                                :error="$errors->first('telefone')"
                            />
                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">
                            <x-forms.input-with-icon
                                id="email"
                                name="email"
                                icon="envelope"
                                value="{{ old('email') }}"
                                :error="$errors->first('email')"
                            />
                        </div>
                    </div>
                </x-forms.form>

            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
