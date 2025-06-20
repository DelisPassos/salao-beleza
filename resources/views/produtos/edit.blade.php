<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Produto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nome do produto:</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo:</label>
                        <input type="text" name="type" value="{{ $product->type }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantidade em estoque:</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Unidade:</label>
                        <input type="text" name="unit" value="{{ $product->unit }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Preço de compra:</label>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fornecedor:</label>
                        <select name="supplier_id" class="form-select" required>
                            @foreach($suppliers as $s)
                                <option value="{{ $s->id }}" @if($s->id == $product->supplier_id) selected @endif>
                                    {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
