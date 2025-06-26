<x-app-layout>
    <x-layout.header :title="'Cadastrar Novo Produto'" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                {{-- Formulário --}}
                <x-forms.form :action="route('produtos.store')" :cancelRoute="route('produtos.index')">

                    <div class="row">
                        <div class="col-md-6">
                            <x-forms.input-with-icon 
                                id="nome" 
                                name="nome" 
                                icon="box-seam" 
                                value="{{ old('nome') }}" 
                                error="{{ $errors->first('nome') }}" 
                            />
                        </div>
                        <div class="col-md-6">
                            <x-forms.input-with-icon 
                                id="descricao" 
                                name="descricao" 
                                icon="card-text" 
                                value="{{ old('descricao') }}" 
                                error="{{ $errors->first('descricao') }}" 
                            />
                        </div>

                        <div class="col-md-6">
                            <x-forms.input-with-icon 
                                id="quantidade" 
                                name="quantidade" 
                                icon="123" 
                                type="number" 
                                min="0"
                                value="{{ old('quantidade') }}" 
                                error="{{ $errors->first('quantidade') }}" 
                            />
                        </div>
                        <div class="col-md-6">
                            <x-forms.input-with-icon 
                                id="volume" 
                                name="volume" 
                                icon="droplet" 
                                value="{{ old('volume') }}" 
                                error="{{ $errors->first('volume') }}" 
                            />
                        </div>

                        <div class="col-md-6">
                            <x-forms.input-with-icon 
                                id="preco" 
                                name="preco" 
                                icon="currency-dollar" 
                                type="number" 
                                step="0.01" 
                                min="0"
                                value="{{ old('preco') }}" 
                                error="{{ $errors->first('preco') }}" 
                            />
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <x-forms.input-label for="fornecedor_id" value="Fornecedor" />
                                <select name="fornecedor_id" id="fornecedor_id"
                                    class="form-select bg-black text-white border-white">
                                    <option value="">Selecione um fornecedor</option>
                                    @foreach($fornecedores as $fornecedor)
                                        <option value="{{ $fornecedor->id }}" {{ old('fornecedor_id') == $fornecedor->id ? 'selected' : '' }}>
                                            {{ $fornecedor->nome }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-forms.input-error :messages="$errors->get('fornecedor_id')" class="mt-2 text-warning" />
                            </div>
                        </div>
                    </div>

                </x-forms.form>

            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>
