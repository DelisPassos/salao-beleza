<x-app-layout>
    <x-layout.header title="Editar Produto" />

    <div class="py-5 bg-black text-white">
        <div class="container">
            <x-cards.card-t-privado>

                <x-forms.form 
                    :action="route('produtos.update', $produto->id)" 
                    :cancelRoute="route('produtos.index')">
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <x-forms.input-with-icon 
                                id="nome" 
                                name="nome" 
                                icon="box-seam" 
                                value="{{ old('nome', $produto->nome) }}" 
                                error="{{ $errors->first('nome') }}" 
                            />
                        </div>

                        <div class="col-md-6">
                            <x-forms.input-with-icon 
                                id="descricao" 
                                name="descricao" 
                                icon="card-text" 
                                value="{{ old('descricao', $produto->descricao) }}" 
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
                                value="{{ old('quantidade', $produto->quantidade) }}" 
                                error="{{ $errors->first('quantidade') }}" 
                            />
                        </div>

                        <div class="col-md-6">
                            <x-forms.input-with-icon 
                                id="volume" 
                                name="volume" 
                                icon="droplet" 
                                value="{{ old('volume', $produto->volume) }}" 
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
                                value="{{ old('preco', $produto->preco) }}" 
                                error="{{ $errors->first('preco') }}" 
                            />
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="fornecedor_id" class="form-label text-white fw-semibold">
                                    <i class="bi bi-truck me-1"></i> Fornecedor
                                </label>
                                <select name="fornecedor_id" id="fornecedor_id" class="form-select bg-black text-white border-white" required>
                                    <option value="">Selecione um fornecedor</option>
                                    @foreach($fornecedores as $fornecedor)
                                        <option value="{{ $fornecedor->id }}"
                                            {{ old('fornecedor_id', $produto->fornecedor_id) == $fornecedor->id ? 'selected' : '' }}>
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
