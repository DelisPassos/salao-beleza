<x-app-layout>
    <x-layout.header title="Editar Produto" />

    <div class="py-5 bg-black text-white">
        <div class="container">

            {{-- Card padrão com estilo escuro --}}
            <x-cards.card-t-privado>

                <x-forms.form 
                    :action="route('produtos.update', $produto->id)" 
                    :cancelRoute="route('produtos.index')">
                    @method('PUT')

                    {{-- Nome --}}
                    <div class="mb-3">
                        <x-forms.input-label for="nome" value="Nome do Produto" />
                        <input type="text" name="nome" id="nome"
                            class="form-control bg-black text-white border-warning"
                            value="{{ old('nome', $produto->nome) }}" required>
                        <x-forms.input-error :messages="$errors->get('nome')" class="mt-2 text-warning" />
                    </div>

                    {{-- Descrição --}}
                    <div class="mb-3">
                        <x-forms.input-label for="descricao" value="Descrição" />
                        <textarea name="descricao" id="descricao"
                            class="form-control bg-black text-white border-warning" rows="2">{{ old('descricao', $produto->descricao) }}</textarea>
                        <x-forms.input-error :messages="$errors->get('descricao')" class="mt-2 text-warning" />
                    </div>

                    {{-- Quantidade --}}
                    <div class="mb-3">
                        <x-forms.input-label for="quantidade" value="Quantidade" />
                        <input type="number" name="quantidade" id="quantidade"
                            class="form-control bg-black text-white border-warning"
                            value="{{ old('quantidade', $produto->quantidade) }}" required>
                        <x-forms.input-error :messages="$errors->get('quantidade')" class="mt-2 text-warning" />
                    </div>

                    {{-- Volume/Peso --}}
                    <div class="mb-3">
                        <x-forms.input-label for="volume" value="Volume/Peso" />
                        <input type="text" name="volume" id="volume"
                            class="form-control bg-black text-white border-warning"
                            value="{{ old('volume', $produto->volume) }}" required>
                        <x-forms.input-error :messages="$errors->get('volume')" class="mt-2 text-warning" />
                    </div>

                    {{-- Preço --}}
                    <div class="mb-3">
                        <x-forms.input-label for="preco" value="Preço (R$)" />
                        <input type="number" step="0.01" name="preco" id="preco"
                            class="form-control bg-black text-white border-warning"
                            value="{{ old('preco', $produto->preco) }}" required>
                        <x-forms.input-error :messages="$errors->get('preco')" class="mt-2 text-warning" />
                    </div>

                </x-forms.form>
            </x-cards.card-t-privado>
        </div>
    </div>
</x-app-layout>